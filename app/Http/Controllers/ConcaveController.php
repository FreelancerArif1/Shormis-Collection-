<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Inertia\Inertia;
use Auth;
use Session;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\Product;
use App\Models\Blog;
use Validator;
use Hash;

class ConcaveController extends Controller{

    public function dashboard($slug = null){
        $user = Auth::user();
        $orders = Order::where('user_id',Auth::id())->with('order_details')->get();
        foreach($orders as $order){
            if($order->order_details){
                foreach($order->order_details as $details){
                    $details->product_name = Product::find($details->product_id)->name;
                }
            }
        }
        if(!$slug){
            $pageTitle = 'Account Details';
        }else{
            $pageTitle = str_replace('-',' ',$slug);
        }
        

        return Inertia::render('Dashboard', [
            'pageSlug'  => $slug,
            'user'      => $user,
            'orders'    => $orders,
            'pageTitle' => $pageTitle
        ]);
    }

    public function change_password(Request $request){
        $old_password = $request->old_password;
        $new_password = $request->new_password;
        $confirm_password = $request->confirm_password;
        $rules = [
            'old_password' => 'required',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'required | min:6'
        ];
        $message = [];

        $validator = Validator::make($request->all(), $rules,$message);
        
        if ($validator->fails()) {
            $msg =  implode('<br>',$validator->errors()->all());
            session()->flash('error', $msg); 
            return redirect()->back();
        }else{
            $current_password = Auth::User()->password;           
            if(Hash::check($request->old_password, $current_password)){          
                $user_id = Auth::User()->id;                       
                $user = DB::table('web_users')->where('id',$user_id)->update(['password' =>Hash::make($request->password) ]);
                session()->flash('success', 'Your password has been successfully changed!'); 
                return redirect()->back();
            }
            else{           
                session()->flash('error', 'Please enter correct old password!'); 
                return redirect()->back();
            }

        }
    }

    public function change_account_detals(Request $request){
        $data = [];
        $data['name'] =  $request->name;
        $data['phone'] =  $request->phone;
        $data['billing_address'] =  $request->billing_address;
        $data['shipping_address'] =  $request->shipping_address;
        DB::table('web_users')->where('id',Auth::id())->update($data);
        session()->flash('success', 'Your account information has been successfully updated!'); 
        return redirect()->back();

    }
    
    

    public function home($feature_cat_id=null){

        $brands = DB::table('brands')->where('is_active', 1)->get() ?? null;
        $sliders = DB::table('sliders')->get() ?? null;
        $new_arrival = Product::where('is_active', 1)->orderBy('id', 'DESC')->with('deal')->limit(15)->get() ?? null;
      //  $all_products = Product::where('is_active', 1)->where('promotion_price','!=', NULL)->orderBy('id', 'DESC')->with('deal')->limit(15)->get() ?? null;


        $featuredCatIds =  Product::where('featured', 1)->where('is_active', 1)->with('deal')->pluck('category_id');
        $featuredCategories = DB::table('categories')->whereIn('id', $featuredCatIds)->where('is_active', 1)->limit(16)->get();
        $featured_product =  Product::where('featured', 1)->where('is_active', 1)->with('deal')->get();

        $blogs = DB::table('blogs')->where('is_active', 1)->orderBy('id', 'DESC')->get() ?? null;


        $d_percentage = DB::table('deals')->where('percentage', '!=', Null)->where('expire', '>=', \Carbon\Carbon::now())->orderBy('id', 'DESC')->first();
  
        if($d_percentage){
            $deal_date = date('Y/h/d', strtotime($d_percentage->expire));
            if($d_percentage->percentage){
               $deal_percentage_data = Product::where('is_active', 1)->where('id', $d_percentage->product_id)->first() ?? null;
                $deal_percentage_data->image = explode(',',$deal_percentage_data->image);
               if($deal_percentage_data->promotion_price){
                  $dpp = ($d_percentage->percentage / 100) * $deal_percentage_data->promotion_price ?? null;
                  $deal_percentage_price = $deal_percentage_data->promotion_price - $dpp;
               }elseif($deal_percentage_data->price){
                 $dp = ($d_percentage->percentage / 100) * $deal_percentage_data->price ?? null;
                 $deal_percentage_price = $deal_percentage_data->price - $dp;
               }

            }elseif($d_percentage->price){
                $deal_price_data = Product::where('is_active', 1)->where('id', $d_percentage->product_id)->first() ?? null;
                // var_dump($deal_price_data->slug);
                // exit;
                $deal_price_data->image = explode(',',$deal_price_data->image);
                $deal_price = $d_percentage->price ?? null;
            }
        }

        $d_price = DB::table('deals')->where('price', '!=', Null)->where('expire', '>=', \Carbon\Carbon::now())->orderBy('id', 'DESC')->first();
       
        if($d_price){
         if($d_price->price){
                $deal_price_data = Product::where('is_active', 1)->where('id', $d_price->product_id)->first() ?? null;
                // var_dump($deal_price_data->slug);
                // exit;
                $deal_price_data->image = explode(',',$deal_price_data->image);
                $deal_price = $d_price->price ?? null;
            }
        }


        if(Auth::user()){
            $user = Auth::user();
        }else{
            $user = null;
        }
        return Inertia::render('Home', [
            'user'      => $user,
            'slider' => $sliders,
            'brands' => $brands,
            'new_arrival_product'   => $new_arrival,
            //'all_products'          => $all_products,
            'featuredCategories'    => $featuredCategories,
            'featured_product'      => $featured_product,
            'deal_percentage_data'  => $deal_percentage_data ?? null,
            'deal_percentage_price' => $deal_percentage_price ?? null,
            'deal_price_data'       => $deal_price_data ?? null,
            'deal_price'            => $deal_price ?? null,
            'deal_date'             => $deal_date ?? null,
            'blogs'                 => $blogs ?? null,
        ]);
    }






    public function fetured($cat_id){
        if($cat_id){
            $id = $cat_id;
        }else{
            $id = 1; 
        }
   

    }


   
    public function about(){
        $categories = DB::table('categories')->where('is_active', 1)->get();
        if(Auth::user()){
            $user = Auth::user();
        }else{
            $user = null;
        }
        return Inertia::render('About', [
            'user'      => $user,
            'cat' => $categories,
        ]);
    }  
    public function contact(){
        return Inertia::render('Contact');
    }  
    // public function privacy_policy(){
    //     return Inertia::render('Privacy_policy');
    // }  
    


    public function register(){
        return Inertia::render('Myaccount');
    }

    

    
    public function signup(){
        return Inertia::render('Signup');
    }

    public function contact_submit(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'min:11',
            'message' => 'required',
        ]);
        $data['name']   = $request->name;
        $data['email']    = $request->email;
        $data['phone']   = $request->phone;
        $data['subject'] = $request->subject;
        $data['message'] = $request->message;
        DB::table('con_contact')->insert($data);
        session()->flash('successMessage', 'Message send successfully..!');
        return back();
    }   
    

    public function contact_submit2(Request $request){
        if(!$request->name){
            session()->flash('errorMessage', 'Name field in required.');
            return back();
        }
        if(!$request->email){
            session()->flash('errorMessage', 'Email field in required.');
            return back();
        }
        if(!$request->message){
            session()->flash('errorMessage', 'Message field in required.');
            return back();
        }

        $data['name']   = $request->name;
        $data['email']    = $request->email;
        $data['message'] = $request->message;

        DB::table('con_contact')->insert($data);
        session()->flash('successMessage', 'Message send successfully..!');
        return back();
    } 


    public function register_web(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'nullable|email|unique:web_users',
            'phone' => 'required|min:11|max:11|unique:web_users',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'required | min:6'
        ]);

        $data['name']        = $request->name;
        $data['email']       = $request->email;
        $data['phone']       = $request->phone;
        $data['password']    = Hash::make($request->password);
        DB::table('web_users')->insert($data);
        session()->flash('success', 'You account has been successfully created!');
        return back();
    }


    public function web_login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if(is_numeric($request->get('email'))){
            $credentials = ['phone'=>$request->get('email'),'password'=>$request->get('password')];
        }elseif(filter_var($request->get('email'), FILTER_VALIDATE_EMAIL)) {
            $credentials = ['email' => $request->get('email'), 'password'=>$request->get('password')];
        }

        if (Auth::attempt($credentials)) {
            return redirect('/dashboard');
        }else{
            session()->flash('error', 'Opps! You have entered invalid credentials');
            return back();
        }
    }

 

    public function newslatter_submit(Request $request){
        $request->validate([
            'email' => 'required|email',
        ]);
        $data['email']   = $request->email;
        $data['ip']      = $request->ip();
        $data['status']  = 1;
        $email = DB::table('con_neswlatter')->where('email', $request->email)->first();
        if($email){
            session()->flash('error', 'Sorry..! This eamil already exist.');
            return back();
        }else{
            DB::table('con_neswlatter')->insert($data);
            session()->flash('success', 'Thank you for your subscription!');
            return back();
        }

    }  


    
    public function compare(){

        $compare = session()->get('compare');
        $compare_count = count($compare['products']);
 
        return Inertia::render('Product/Compare', [
            'compare_count'      => $compare_count,
        ]);
    }

    public function redirectToProvider($provider){
        switch ($provider) {
            case 'google':
                return Socialite::driver('google')->redirect();
                break;
            case 'facebook':
                return Socialite::driver('facebook')->redirect();
                break;
        }

    }




//Blog



public function blog_page(){
    $blogs = DB::table('blogs')->where('is_active', 1)->orderBy('id', 'DESC')->limit(12)->get() ?? null;
    $user = Auth::user();

    return Inertia::render('Blog/Index', [
        'user'      => $user,
        'blogs'            => $blogs ?? null,
    ]); 
}







    public function handleProviderCallback($provider)
    {
        switch ($provider) {
            case 'google':
                try {
                    $user = Socialite::driver('google')->user();
                } catch (\Exception $e) {
                    return redirect('/login');
                }
                break;
            case 'facebook':
                try {
                    $user = Socialite::driver('facebook')->user();
                } catch (\Exception $e) {
                    return redirect('/login');
                }
                break;
        }


        // check if they're an existing user
        $existingCustomer = User::where('email', $user->email)->first();

        if($existingCustomer){
            // log them in
            Auth::login($existingCustomer, true);
        } else {
            // create a new user
            $newCustomer                  = new Customer;
            $newCustomer->name            = $user->name;
            $newCustomer->email           = $user->email;
            $newCustomer->save();

            Auth::login($newCustomer, true);
        }

        return redirect()->to('/dashboard');
        /* if(session()->has('cart')){
            return redirect()->to('/cart');
        }else{
            return redirect()->to('/my-account');
        } */
    }
    
    

}
