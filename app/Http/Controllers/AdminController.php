<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Flasher\Toastr\Prime\ToastrInterface;

class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }

    public function category_get(){
        $categories = Category::all();

        return view('admin.category',compact('categories'));
    }

    public function category_post(Request $request){
        $request->validate([
            "category_name" => ['required','max:255'],
        ]);

        $category = new Category;

        $category->category_name = $request->category_name;
        $category->save();
        toastr()->timeOut(2000)->success('Category added successfully');
        return redirect()->back();
    }

    public function category_put(string $id){
        $category = Category::findOrFail($id);
        return view('admin.edit_category',compact('category'));
    }

    public function category_update(Request $request,$id){
        $request->validate([
            "category_name" => ['required','max:255'],
        ]);

        $category = Category::findOrFail($id);

        $category->category_name = $request->category_name;
        $category->save();
        toastr()->timeOut(2000)->success('Category Updated successfully');
        return redirect()->route('admin.category.get');
    }

    public function category_delete($id){
        $category = Category::find($id);
        $category->delete();
        return redirect()->back();
    }
}
