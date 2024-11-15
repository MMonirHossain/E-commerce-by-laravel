<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index(){
        $products = Product::orderBy('created_at', 'desc')->limit(8)->get();;
        return view('home.index',compact('products'));
    }
    public function show_one_product($id){
        $product = Product::findORFail($id);;
        return view('home.singleproduct',compact('product'));
    }

    public function show_all_product(){
        $products = Product::paginate(16);;
        return view('home.allproduct',compact('products'));
    }

}
