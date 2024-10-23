<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use File;
use Flasher\Toastr\Prime\ToastrInterface;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.allproduct',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.addproduct',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => ['required','max:255'],
            "description"=>['required'],
            "price"=>['required','integer'],
            "category_id"=>['required','integer'],
            "quantity"=>['integer'],
            "image"=>['required','image','max:1024'],
        ]);

        $filename = time()."_".$request->image->getClientOriginalName();
        $filepath = $request->image->storeAs('/uploads',$filename);
        
        $product = new Product();

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->quantity = $request->quantity;
        $product->image = $filepath;

        $product->save();
        toastr()->timeOut(2000)->success('Product added successfully');
        return redirect()->route('admin_product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product.viewproduct',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product= Product::findOrFail($id);
        File::delete(public_path('storage/'.$product->image));
        $product->delete();
        toastr()->timeOut(2000)->success('Product Deleted successfully');
        return redirect()->back();
    }
}
