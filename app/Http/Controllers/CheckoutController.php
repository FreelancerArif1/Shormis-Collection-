<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Inertia\Inertia;
use DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Auth;


class CheckoutController extends Controller
{
    
    public function index(){
        $cart = session()->get('cart');
        
        return Inertia::render('Checkout/Cart', [
            'cart' => $cart
        ]);
    }

    public function checkout(){
        $cart = session()->get('cart');
        $total_items = $cart['total_items'];
        
        return Inertia::render('Checkout/Checkout', [
            'total_items' => $total_items,
            'user' => Auth::user()
        ]);
    }


    
    public function order_submit(Request $request){

        $request->validate([
            'name' => 'required',
            'mobile_number' => 'required|min:11|max:11',
            'email' => 'nullable|email',
            'division' => 'required',
            'district' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
            'address' => 'required',
        ]);
    
        $data['name']        = $request->name;
        $data['phone']       = $request->mobile_number;
        $data['email']       = $request->email;
        $data['country']     = $request->country;
        $data['state']       = $request->division;
        $data['district']    = $request->district;
        $data['city']        = $request->city;
        $data['postal_code'] = $request->postal_code;
        $data['address']     = $request->address;

        $data['shipping_division']    = $request->shipping_division;
        $data['shipping_district']    = $request->shipping_district;
        $data['shipping_city']        = $request->shipping_city;
        $data['shipping_postalCode'] = $request->shipping_postalCode;
        $data['shipping_address']     = $request->shipping_address;

        $data['type']    = $request->payment_method;
        $data['transaction_id']= uniqid();
        $data['currency'] = "$";
        $data['status'] = 'Pending';
        $data['origin'] = 'Website';
        $data['notes'] = $request->notes;
        $data['created_at'] = Carbon::now();




        if(Auth::user()){
            $old_user = true;
            $data['user_id'] = Auth::user()->id;
        }else{
            $old_user = false;
            $email = DB::table('web_users')->where('email', $request->email)->first();
            $phone = DB::table('web_users')->where('phone', $request->mobile_number)->first();
            if($email){
                session()->flash('error', 'This email already exist. Please login to place an order or use different email address.');
                return redirect()->back();
            }elseif($phone){
                session()->flash('error', 'This Mobile number is already associate with an account. Please login to place an order or use different mobile number.');
                return redirect()->back();
            }else{
                $password = rand(100000,999999);
                $userData['password'] =  Hash::make($password);
                $userData['name']        = $request->name;
                $userData['phone']       = $request->mobile_number;
                $userData['email']       = $request->email;
                $userId = DB::table('web_users')->insertGetId($userData);
                $data['user_id'] = $userId;
            }
            
        }


        $cart = session()->get('cart');
        $allQty = 0;

        $data['sub_total'] = $cart['sub_total'];

        foreach($cart['product'] as $c ){
            $allQty += $c['count'];
        }

        $data['qty'] = $allQty;

        if($request->shipping_charge == 'insidedhaka' || $request->shipping_charge == 'outsidedhaka'){
            $data['shipping_charge'] = ($request->shipping_charge  == 'insidedhaka') ? 80:150;
        }else{
            session()->flash('error', 'Something went wrong.');
            return redirect()->back();
        }
        $data['amount'] = $data['sub_total']+$data['shipping_charge'];
        $orderId =  DB::table('orders')->insertGetId($data);

        foreach($cart['product'] as $c ){
            $allQty += $c['count'];
            $product_id = $c['product_id'];
            $variant_id = $c['variant_id'];
            $remove_qty = $c['count'];

            if($product_id > 0){
                $productData = DB::table('products')->where('id', $product_id)->first();
                if($productData){
                    DB::table('products')->where('id', $product_id)->update(['qty'=> $productData->qty - $remove_qty]);
                }
            }
               
            if($variant_id > 0){
                $variantData = DB::table('product_variants')->where('variant_id', $variant_id)->first();
                if($variantData){
                    DB::table('product_variants')->where('variant_id', $variant_id)->update(['qty'=> $variantData->qty - $remove_qty]);
                }
            }

            //Insert Data to order Details
            $orderDetails = [];
            $orderDetails['order_id'] = $orderId;
            $orderDetails['product_id'] = $c['product_id'];
            $orderDetails['variant_id'] = $c['variant_id'] ? $c['variant_id']: Null;
            $orderDetails['count'] = $c['count'];
            $orderDetails['amount'] = $c['price'];
            $orderDetails['created_at'] = Carbon::now();
            DB::table('order_details')->insert($orderDetails);

        }



        //Send SMS to Customer
        if($old_user){
            $message = 'Thank you for your order. Your Order ID #'.$orderId;
        }else{
            $message = 'Thank you for your order. Your Order ID #'.$orderId.'. We have created an account for you to track your order. Login details: #Mobile Number: '.$request->mobile_number.' , #Password: '.$password;
        }
     
        \Helper::sendSms($request->mobile_number,$message);


        session()->forget('cart');
        session()->flash('success', 'Order placed successfully.');
        return redirect('/');
    }

  

    

}
