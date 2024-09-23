<?php
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AdminuserController;
use App\Http\Controllers\BusinessController;











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
Route::get('/Category/view/{cat_id}',[CategoryController::class,'viewcategory'])->name('Category.view');
Route::get('/Category/edit/{cat_id}',[CategoryController::class,'edit'])->name('Category.edit'); 
Route::post('/Category/update/{catid}',[CategoryController::class, 'update'])->name('Category.update');
Route::get('/Category/delete/{cat_id}',[CategoryController::class,'delete'])->name('Category.delete');




//Product
Route::get('/Product',[ProductController::class,'product'])->name('Product');
Route::get('/Product-form',[ProductController::class,'form'])->name('Product.form');
Route::post('/Product-store',[ProductController::class,'store'])->name('Product.store');
Route::get('/Product/view/{p_id}',[ProductController::class,'viewproduct'])->name('Product.view');
Route::get('/Product/edit/{p_id}',[ProductController::class,'edit'])->name('Product.edit');
Route::post('/Product/update/{proid}',[ProductController::class, 'update'])->name('Product.update');
Route::get('/Product/delete/{p_id}',[ProductController::class,'delete'])->name('Product.delete');

//Customer
Route::get('/Customer-list',[CustomerController::class,'list'])->name('Customer.list');
Route::get('/Customer-form',[CustomerController::class,'form'])->name('Customer.form');
Route::post('/Customer-store',[CustomerController::class,'store'])->name('Customer.store');


//Sale
Route::get('/Sale-list',[SaleController::class,'list'])->name('Sale.list');
Route::get('/Show-product/{productId}',[SaleController::class,'showProduct'])->name('Show.product');
Route::get('/Add-to-cart/{productId}',[SaleController::class, 'addToCart'])->name('Add.to.cart');
Route::get('/Clear-cart',[SaleController::class, 'clearCart'])->name('Cart.clear');
Route::get('/View-cart',[SaleController::class, 'viewcart'])->name('View.cart');
Route::get('/Search',[SaleController::class, 'search'])->name('Search');
Route::post('/Place-order',[SaleController::class, 'placeOrder'])->name('Place.order');
Route::post('/Sale-view',[SaleController::class, 'saleview'])->name('Sale.view');
Route::get('/View-invoice/{sale_id}',[SaleController::class,'viewInvoice'])->name('View.invoice');
Route::get('/Order-list',[SaleController::class,'orderList'])->name('Order.list');
Route::get('/order-cancel/{order_id}',[SaleController::class,'cancelOrder'])->name('Cancel.order');
Route::post('/update-cart/{pid}',[SaleController::class,'updateCart'])->name('Update.cart');



//Brand
Route::get('/Brand',[BrandController::class,'brand'])->name('Brand');
Route::get('/Brand-form',[BrandController::class,'form'])->name('Brand.form');
Route::post('/Brand-store',[BrandController::class,'store'])->name('Brand.store');
Route::get('/Brand/edit/{b_id}',[BrandController::class,'edit'])->name('Brand.edit');
Route::post('/Brand/update/{b_id}',[BrandController::class, 'update'])->name('Brand.update');
Route::get('/Brand/delete/{b_id}',[CategoryController::class,'delete'])->name('Brand.delete');




//Reports
Route::get('/Report',[SaleController::class,'report'])->name('Report');

//Stock
Route::get('/Stock',[StockController::class,'stock'])->name('Stock');
Route::get('/Stock/delete/{s_id}',[StockController::class,'delete'])->name('Stock.delete');




//Payment
Route::get('/example1', [PaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [PaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [PaymentController::class, 'index']);
Route::post('/pay-via-ajax', [PaymentController::class, 'payViaAjax']);

Route::post('/success', [PaymentController::class, 'success']);
Route::post('/fail', [PaymentController::class, 'fail']);
Route::post('/cancel', [PaymentController::class, 'cancel']);

Route::post('/ipn', [PaymentController::class, 'ipn']);

//Admin-User
Route::get('/Admin-user',[AdminuserController::class,'user'])->name('Admin.user');

//Business-Settings
Route::get('/business-settings',[BusinessController::class,'settings'])->name('Admin.business.settings');
Route::post('/business-settings',[BusinessController::class,'settingSubmit'])->name('Settings.submit');



});


