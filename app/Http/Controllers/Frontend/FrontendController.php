<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class FrontendController extends Controller
{
    public function index(){

        $products = Product::all()->where("status", 1);
        return view('frontend.index', compact('products'));
    }

    public function shop(){
        return view('frontend.shop');
    }

    public function single(){
        return view('frontend.single-product');
    }

    public function cart(){
        return view('frontend.cart');
    }

    public function checkout(){
        return view('frontend.checkout');
    }

    

   
}
