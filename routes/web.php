<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\registerController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\admin\productController;
use App\Http\Controllers\admin\categoryController;
use App\Http\Controllers\admin\EnquiryController;
use App\Http\Controllers\shopController;


//auth ROUTE
// Route::get('register',[registerController::class,'index'])->name('register');
// Route::post('register',[registerController::class,'register'])->name('createUser');
Route::get('login',[LoginController::class,'index'])->name('login');
Route::post('login',[LoginController::class,'authenticate'])->name('authenticate');
Route::get('logout',[LoginController::class,'logout'])->name('logout');

//frontend
Route::get('/', function () { return view('frontend.index');})->name('home');
Route::get('about-us', function () { return view('frontend.about');})->name('about');
Route::get('contact', function () {return view('frontend.contact');})->name('contact');
Route::get('blog', function () {return view('frontend.blog');})->name('blog');
Route::get('service', function () { return view('frontend.services');})->name('services');
Route::get('thankyou', function () {return view('frontend.thankyou');})->name('thankyou');
Route::get('cart', function () {return view('frontend.cart');})->name('cart');
Route::get('shop',[shopController::class,'index'])->name('shop');
Route::get('shop/{id}',[shopController::class,'Single_Product'])->name('Single_Product');
Route::post('Equiry_Product/{id}',[EnquiryController::class,'addEnquiry'])->name('Equiry_Product');
Route::get('/get-more-products/{offset}', [ShopController::class, 'getMoreProducts']);

// admin route
Route::get('dashboard',[EnquiryController::class,'index'])->name('dashboard')->middleware('auth');
Route::get('Product',[productController::class,'index'])->name('product')->middleware('auth');
Route::get('Product/add',[productController::class,'add_product'])->name('add_product')->middleware('auth');
Route::post('Product/create',[productController::class,'create_product'])->name('create_product')->middleware('auth');
Route::get('Product/image/{id}/{image}',[productController::class,'delete_product_image'])->name('delete_product_image')->middleware('auth');
Route::get('Product/edit/{id}',[productController::class,'edit_product'])->name('edit_product')->middleware('auth');
Route::post('Product/update/{id}',[productController::class,'update_product'])->name('update_product')->middleware('auth');
Route::post('Product/delete/{id}',[productController::class,'delete_product'])->name('delete_product')->middleware('auth');

Route::get('Category',[categoryController::class,'index'])->name('category')->middleware('auth');
Route::get('Category/add',[categoryController::class,'add_category'])->name('add_category')->middleware('auth');
Route::post('Category/add',[categoryController::class,'create_category'])->name('create_category')->middleware('auth');
Route::get('Category/edit/{id}',[categoryController::class,'edit_category'])->name('edit_category')->middleware('auth');
Route::post('Category/update/{id}',[categoryController::class,'update_category'])->name('update_category')->middleware('auth');
Route::post('Category/delete/{id}',[categoryController::class,'delete_category'])->name('delete_category')->middleware('auth');
