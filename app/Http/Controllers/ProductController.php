<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Inertia\Inertia;

class ProductController extends Controller{
    public function SingleProduct($slug){
       // $product = DB::table('product')->where('slug', $slug)->first();
        return Inertia::render('Components/product/single', [
           // 'user' => $user,
        ]);
    }
    public function allProduct(){
        // $product = DB::table('product')->where('slug', $slug)->first();
         return Inertia::render('Components/product/allProduct', [
            // 'user' => $user,
         ]);
     }

     public function cartPage(){
        // $product = DB::table('product')->where('slug', $slug)->first();
         return Inertia::render('Components/cart', [
            // 'user' => $user,
         ]);
     }
}