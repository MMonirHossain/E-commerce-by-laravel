<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('normal_user.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/admin',[AdminController::class,'index'])->middleware(['auth','admin'])->name('admin.dashboard');
Route::get('/admin_category',[AdminController::class,'category_get'])->middleware(['auth','admin'])->name('admin.category.get');
Route::post('/admin_category',[AdminController::class,'category_post'])->middleware(['auth','admin'])->name('admin.category.post');
Route::get('/admin_edit_category/{id}',[AdminController::class,'category_put'])->middleware(['auth','admin'])->name('admin.category.put');
Route::get('/delete_category/{id}',[AdminController::class,'category_delete'])->middleware(['auth','admin'])->name('admin.category.delete');
Route::post('/admin_update_category/{id}',[AdminController::class,'category_update'])->middleware(['auth','admin'])->name('admin.category.update');


Route::get('/add_product',[ProductController::class,'addProduct'])->middleware(['auth','admin'])->name('admin.add_product');
Route::resource('/admin_product', ProductController::class)->middleware(['auth','admin']);