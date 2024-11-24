<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
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

    public function mycart(){

        if(Auth::id()){
            $carts = Cart::where('user_id',Auth::user()->id)->get();
            $cart_count = count($carts);
        }else{
            $cart_count='';
        }

        return view('home.mycart',compact('cart_count','carts'));
    }

    public function delete_cart($id){

        $cart = Cart::findOrFail($id);
        $cart->delete();

        if(Auth::id()){
            $carts = Cart::where('user_id',Auth::user()->id)->get();
            $cart_count = count($carts);
        }else{
            $cart_count='';
        }

        return view('home.mycart',compact('cart_count','carts'));
    }

    public function confirm_order(Request $request){
        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;
        $userid = Auth::user()->id;
        $carts = Cart::where('user_id',$userid)->get();

        foreach($carts as $cart){
            $order =  new Order();
            $order->name = $name;
            $order->reciver_address = $address;
            $order->phone = $phone;
            $order->user_id = $userid;
            $order->product_id = $cart->product_id;
            $order->save();
            $cart->delete();
        }

        toastr()->timeOut(2000)->success('Order Placed Successfully');
        return redirect()->back();

    }

}
