<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $products = Product::orderBy('created_at', 'desc')->limit(8)->get();

        if(Auth::id()){
            $cart_count = Cart::where('user_id',Auth::user()->id)->count();
        }else{
            $cart_count='';
        }
        
        return view('home.index',compact('products','cart_count'));
    }
    public function show_one_product($id){
        $product = Product::findORFail($id);

        if(Auth::id()){
            $cart_count = Cart::where('user_id',Auth::user()->id)->count();
        }else{
            $cart_count='';
        }
        return view('home.singleproduct',compact('product','cart_count'));
    }

    public function show_all_product(){
        $products = Product::paginate(16);
        if(Auth::id()){
            $cart_count = Cart::where('user_id',Auth::user()->id)->count();
        }else{
            $cart_count='';
        }
        return view('home.allproduct',compact('products','cart_count'));
    }

    public function add_to_cart($id){
        $cart = new Cart;
        $cart->user_id = Auth::user()->id;
        $cart->product_id = $id;
        $cart->save();
        toastr()->timeOut(2000)->success('Added to Cart');
        return redirect()->back();
    }

}
