<?php
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;



use Illuminate\Support\Facades\Route;

Route::get('/login',[AuthenticationController::class,'loginForm'])->name('login');
Route::post('/do-login',[AuthenticationController::class, 'doLogin'])->name('do.login');


Route::group(['middleware'=>'auth'],function(){

Route::get('/Admin',[AdminController::class,'admin'])->name('Admin');
Route::get('/Dashboard',[DashboardController::class,'dashboard'])->name('Dashboard');
Route::get('/logout',[AuthenticationController::class, 'logout'])->name('logout');

//Category
Route::get('/Category',[CategoryController::class,'category'])->name('Category');
Route::get('/Category-form',[CategoryController::class, 'form'])->name('Category.form');
Route::post('/Category-store',[CategoryController::class, 'store'])->name('Category.store');

//Product
Route::get('/Product',[ProductController::class,'product'])->name('Product');
Route::get('/Product-form',[ProductController::class,'form'])->name('Product.form');
Route::post('/Product-store',[ProductController::class,'store'])->name('Product.store');
Route::get('/Product/view/{p_id}',[ProductController::class,'viewproduct'])->name('Product.view');
Route::get('/Product/edit/{p_id}',[ProductController::class,'edit'])->name('Product.edit');
Route::post('/Product/update/{proid}',[ProductController::class, 'update'])->name('Product.update');
Route::get('/Product/delete/{p_id}',[ProductController::class,'delete'])->name('Product.delete');

});


