<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Inertia\Inertia;
use DB;
use Auth;
use Session;
use Carbon\Carbon;
use \Illuminate\Support\Str;

//session_start();

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
     
        $query = '';
        if($request->brands || $request->price ){
            $products = $this->filter_submit($request);
        }elseif($request->s){
            $query = $request->s;
            $products = $this->search($request);
        }elseif($request->allProduct){
            $products = $this->allProduct($request);
        }elseif($request->filterbyproduct){
            $products = $this->filterbyproduct($request);
        }else{
            $products = Product::where('is_active',1)->with('deal')->latest()->paginate(12);
        }

        $brands = DB::table('brands')->where('is_active',1)->get();
        $newproducts = Product::where('is_active',1)->latest()->limit(10)->get();
        $featuedProducts = Product::where('is_active',1)->where('featured',1)->latest()->limit(10)->get();

        foreach($products as $product){
            $product->image = explode(',',$product->image);
        }
        foreach($newproducts as $product){
            $product->image = explode(',',$product->image);
        }
        foreach($featuedProducts as $product){
            $product->image = explode(',',$product->image);
        }

        return Inertia::render('Product/ProductList', [
            'products'          => $products,
            'brands'            => $brands,
            'newproducts'       => $newproducts,
            'featuedProducts'   => $featuedProducts,
            'search_query'      => $query
        ]);


    }

    private function filter_submit($request){
        if(is_int($request->brands)){
            $brands = array($request->brands);
         }else{
             $brands = $request->brands;
         }

        $min_price = $request->price ? min($request->price):1;
        $max_price = $request->price ? max($request->price):1000000;
        if($min_price == $max_price){
            $max_price = $max_price+100;
            if($max_price == 1000000){
                $min_price = 400;
            }
            if($max_price == 110){
                $max_price = 100;
            }
        }else{
            $max_price = $max_price+100;
        }
        if($brands){
            $products = Product::where('is_active',1)->whereIn('brand_id', $brands)->with('deal')->whereBetween('price', [$min_price, $max_price])->latest()->paginate(12);
        }else{
            $products = Product::where('is_active',1)->whereBetween('price', [$min_price, $max_price])->with('deal')->latest()->paginate(12);
        }
        return $products;

    }
    

  
    public function addToCart(Request $request) {
        $cart = session()->get('cart');
        $product = Product::find($request->product_id);
        // var_dump($request->product_id);
        // exit;
        $product_price = \Helper::getPrice($product->id, $product->price, $product->starting_date, $product->last_date);
        $image = 'images/product/'.explode(',',$product->image)[0];
        $variant_id = ($request->variant_id) ? $request->variant_id : null;

        $count  = $request->count;
        if($count < 1) $count = 1 ;

        //Check is Variant or not
        if($product->is_variant == 1 && $variant_id){
            $stockItems = DB::table('product_purchases')->where('product_id',$request->product_id)->where('variant_id',$variant_id)->sum('qty');
            if($stockItems < $count){
                session()->flash('error', 'Limited stock found! You can not add more than '.$stockItems.' items of this product!'); 
                return redirect()->back();
            }
        }else{
            $stockItems = DB::table('product_purchases')->where('product_id',$request->product_id)->sum('qty');
            if($stockItems < $count){
                session()->flash('error', 'Limited stock found! You can not add more than '.$stockItems.' items of this product!'); 
                return redirect()->back();
            }
        }

        if($product->is_variant == 1 && $request->variant_id < 1){
            session()->flash('error', 'Please select any variant first.'); 
            return redirect()->back();    
        }
         
        $variant_data = DB::table('product_variants')->where('variant_id', $request->variant_id)->first();
        if($variant_data){
            $variant_price = $variant_data->additional_price;
        }else{
            $variant_price = 0;
        }
        //Check stock
        $cart['product'][$request->product_id]= [
            'cart_id' => uniqid(),
            'product_id' => $request->product_id,
            'is_variant' => $product->is_variant,
            'variant_id' => $request->variant_id,
            'count' => $count,
            'price' => $product_price+$variant_price,
            'image' => $image,
            'name' => $product->name,

            'brand' =>  DB::table('brands')->where('id', $product->brand_id)->first()->title,
            'category' => DB::table('categories')->where('id', $product->category_id)->first()->name,
      
            'slug' => $product->slug,
        ];



        $cart['total_items'] = count($cart['product']);
        $cart['sub_total'] = 0;
        foreach($cart['product'] as $c ){
            $cart['sub_total'] += $c['price']*$c['count'];
        }
        session()->put('cart', $cart);
        session()->flash('success', 'Product has been successfully added to your cart!'); 
        return redirect()->back();
    }


    public function removeCartItem(Request $request){
        $product_id = $request->product_id;
        $cart = (session()->get('cart')) ? session()->get('cart') : [];

        if($cart){
           if(isset($cart['product'][$product_id])){
                unset($cart['product'][$product_id]);
                $cart['total_items'] = count($cart['product']);
           }
        }

        $cart['sub_total'] = 0;
        foreach($cart['product'] as $c ){
            $cart['sub_total'] += $c['price']*$c['count'];
        }

        session()->put('cart', $cart);
        session()->flash('success', 'Product has been successfully removed from your cart!'); 
        return redirect()->back();
    }

    

    function show($slug){
        $products = Product::where('slug',$slug)->with('deal')->where('is_active',1)->first();
        if($products){
            $reviews = DB::table('product_review')->where('product_id',$products->id)->where('status',1)->latest()->limit(15)->get();
            foreach($reviews as $review){
                $review->created_at = date('d M, Y', strtotime($review->created_at));
            }


            $comboData = [];
            if($products->type == 'combo'){
                $combolistids = explode(',',$products->product_list);
                foreach($combolistids as $pid){
                    $comboData[] = Product::find($pid);
                }
                $products->product_list = $comboData;
            }

           $size   = DB::table('product_variants')->where('product_id',$products->id)->where('variant_by','size')->get();
           $color  = DB::table('product_variants')->where('product_id',$products->id)->where('variant_by','color')->get();
           $weight = DB::table('product_variants')->where('product_id',$products->id)->where('variant_by','weight')->get();

           $brands   = DB::table('brands')->where('id', $products->brand_id)->first();
           if($brands){
            $brand = $brands->title;
           }

           $categorys= DB::table('categories')->where('id', $products->category_id)->first();
           if($categorys){
            $category = $categorys->name;
           }

           

           $related_product = Product::latest()->where('category_id',$products->category_id)->with('deal')->where('is_active',1)->get();
           
           foreach($related_product as $product){
                $product->image = explode(',',$product->image);
            }

            $is_reviewable = false;
            $order_for_current_user = DB::table('orders')
            ->select('orders.user_id','order_details.product_id')
            ->join('order_details','order_details.order_id','=','orders.id')
            ->where(['orders.user_id' => Auth::id(), 'order_details.product_id' => $products->id])
            ->get();

 
            if(count($order_for_current_user) > 0){
                $is_reviewable = true; 
            }


            $brands = DB::table('brands')->where('is_active',1)->get();
            $newproducts = Product::where('is_active',1)->latest()->limit(3)->get();
            $featuedProducts = Product::where('is_active',1)->where('featured',1)->latest()->limit(3)->get();
    
    
            foreach($newproducts as $product){
                $product->image = explode(',',$product->image);
            }
            foreach($featuedProducts as $product){
                $product->image = explode(',',$product->image);
            }

            $product_img_array = explode(',',$products->image);
            return Inertia::render('Product/ProductView', [
                'product' => $products,
                'newproducts' => $newproducts,
                'featuedProducts' => $featuedProducts,
                'brands' => $brands,
                'product_img_array' => $product_img_array,
                'related_product' => $related_product,
                'brand'   => $brand??null,
                'category'=> $category??null,
                'size'    => $size??null,
                'color'   => $color??null,
                'weight'  => $weight??null,
                'is_reviewable' => $is_reviewable,
                'reviews'  => $reviews
            ]);
        }else{
            return redirect()->back();
        }

    }


    //WishList
    public function addOrRemoveWishList(Request $request) {
        if(!Auth::id()){
            session()->flash('error', 'Please login to add a product to your wishlist!'); 
            return redirect()->back();
        }
        $data = [];
        $data['customer_id'] = Auth::id();
        $data['product_id'] = $request->product_id;
        if(!Auth::id()){
            session()->flash('error', 'Please login to add a product to your wishlist!'); 
        }

        $alreadyInWishlist = DB::table('wishlists')->where('customer_id',Auth::id())->where('product_id',$request->product_id)->first();
        if($alreadyInWishlist){
            DB::table('wishlists')->where('customer_id',Auth::id())->where('product_id',$request->product_id)->delete();
            session()->flash('error', 'Product has been successfully removed from your wishlist!'); 
        }else{
            DB::table('wishlists')->insert($data);
            session()->flash('success', 'Product has been successfully added to your wishlist!'); 
        }
        return redirect()->back();
    }


    //Compare 
    public function add_to_compare(Request $request) {
        $compare = (session()->get('compare')) ? session()->get('compare') : [];

        if(isset($compare['products'][$request->product_id])){
            session()->flash('error', 'Already added in compare list.');
            return redirect()->back();
        }

        $compare = session()->get('compare');
        $product = Product::find($request->product_id);
        $compare['products'][$request->product_id] = [
            'product_id' => $product->id,
            'product_name' => $product->name,
            'slug' => $product->slug,
            'brand' =>  DB::table('brands')->where('id', $product->brand_id)->first()->title,
            'category' => DB::table('categories')->where('id', $product->category_id)->first()->name,
            'product_details' => strip_tags($product->product_details),
            'qty' => $product->qty,
            'price' => \Helper::getPrice($product->id, $product->price, $product->starting_date, $product->last_date),
            'image' => env('PARENT_URL').'images/product/'.explode(',',$product->image)[0],
        ];
        session()->put('compare', $compare);
        session()->flash('success', 'Product has been successfully added to your compare list..!');
        return redirect()->back();
    }


    public function removeComparetItem(Request $request){
        $product_id = $request->product_id;
        $compare = (session()->get('compare')) ? session()->get('compare') : [];

        if($compare){
           if(isset($compare['products'][$product_id])){
                unset($compare['products'][$product_id]);
           }
        }
        session()->put('compare', $compare);
        session()->flash('success', 'Product has been successfully removed from your cart!'); 
        return redirect()->back();
    }

    
    public function category_page(Request $request){
        $categories = DB::table('categories')->where('is_active', 1)->get();

        return Inertia::render('Product/Category', [
            'categories'          => $categories
        ]);
    }


    public function category(Request $request){
        
        $category_slug = $request->categoryslug;
        $category = DB::table('categories')->where('slug',$category_slug)->first();
        $category_name = null;
    
        if($request->brands || $request->price ){
            $products = $this->filter_submit($request);
        }else{
            if($category){
                $category_id = $category->id;
                $category_name = $category->name;
                $products = Product::where('category_id',$category_id)->where('is_active',1)->latest()->paginate(12);
            }else{
                $products = Product::where('is_active',1)->latest()->paginate(12);
            }
        }

        $brands = DB::table('brands')->where('is_active',1)->get();
        $newproducts = Product::where('is_active',1)->latest()->limit(10)->get();
        $featuedProducts = Product::where('is_active',1)->where('featured',1)->latest()->limit(10)->get();

        foreach($products as $product){
            $product->image = explode(',',$product->image);
        }
        foreach($newproducts as $product){
            $product->image = explode(',',$product->image);
        }
        foreach($featuedProducts as $product){
            $product->image = explode(',',$product->image);
        }

        return Inertia::render('Product/ProductList', [
            'products'      => $products,
            'brands'        => $brands,
            'newproducts'   => $newproducts,
            'featuedProducts'   => $featuedProducts,
            'category_name'     =>  $category_name
        ]);
        
    }


    public function deals(Request $request){
        
        $deals = DB::table('deals')->whereDate('expire', '>', Carbon::now())->get();
        $dealProductIds = [];

        if($deals){
            foreach($deals as $deal){
                $dealProductIds[] = $deal->product_id;
            }
        }


        if($request->brands || $request->price ){
            $products = $this->filter_submit($request);
        }else{
            $products = Product::where('is_active',1)->with('deal')->whereIn('id',$dealProductIds)->latest()->paginate(12);
        }

        $brands = DB::table('brands')->where('is_active',1)->get();
        $newproducts = Product::where('is_active',1)->latest()->limit(10)->get();
        $featuedProducts = Product::where('is_active',1)->where('featured',1)->latest()->limit(10)->get();

        foreach($products as $product){
            $product->image = explode(',',$product->image);
        }
        foreach($newproducts as $product){
            $product->image = explode(',',$product->image);
        }
        foreach($featuedProducts as $product){
            $product->image = explode(',',$product->image);
        }

        return Inertia::render('Product/ProductList', [
            'products'      => $products,
            'brands'        => $brands,
            'newproducts'   => $newproducts,
            'featuedProducts'   => $featuedProducts,
        ]);
        
    }

    public function review_submit(Request $request){

        $request->validate([
            'rate' => 'required|numeric|max:5',
            'product_id' => 'required|numeric',
            'testimonial' => 'required|string'
        ]);

        $rate = $request->rate;
        $testimonial = Str::limit($request->testimonial, 290, $end='...');
        $product_id = $request->product_id;

        DB::table('product_review')->updateOrInsert(
            ['product_id'=>$product_id,'user_id'=>Auth::id()],
            ['product_id'=>$product_id,'user_id'=>Auth::id(),'user_name'=>Auth::user()->name,'testimonial' => $testimonial,'rate'=>$rate]
        );
        session()->flash('success', 'Thanks for provide your feedback!'); 
        return redirect()->back();
    }


    private function search(Request $request){
        $query = $request->s;
        if($query){
            $products = Product::where('name','like','%'.$query.'%')
            ->orWhere('slug','like','%'.$query.'%')
            ->orWhere('code',$query)
            ->orWhere('product_details','like','%'.$query.'%')
            ->where('is_active',1)
            ->with('deal')
            ->latest()
            ->paginate(12);
        }
        return $products;
    }
    private function allProduct(Request $request){
        if($request->allProduct == 1){
            $products = Product::where('is_active',1)->with('deal')->latest()->paginate(999999);
        }
        return $products;
    }

    private function filterbyproduct(Request $request){
        if($request->filterbyproduct == 'newest'){
            $products = Product::where('is_active',1)->with('deal')->latest()->paginate(12);
        }elseif($request->filterbyproduct == 'oldest'){
            $products = Product::where('is_active',1)->with('deal')->oldest()->paginate(12);
        }elseif($request->filterbyproduct == 'lowtohigh'){
            $products = Product::where('is_active',1)->with('deal')->orderBy('price', 'asc')->paginate(12);
        }elseif($request->filterbyproduct == 'hightolow'){
            $products = Product::where('is_active',1)->with('deal')->orderBy('price', 'desc')->paginate(12);
        }else{
            $products = Product::where('is_active',1)->with('deal')->paginate(12);
        }
        return $products;
    }


    public function deals_page(){
        
        $deals = DB::table('deals')->whereDate('expire', '>', Carbon::now())->get();
        $dealProductIds = [];
        if($deals){
            foreach($deals as $deal){
                $dealProductIds[] = $deal->product_id;
            }
        }
        $products = Product::where('is_active',1)->with('deal')->whereIn('id',$dealProductIds)->latest()->paginate(12);
        foreach($products as $product){
            $product->image = explode(',',$product->image);
        }

        return Inertia::render('Product/Deal', [
            'products'      => $products,
        ]);
    }


    
    
}
