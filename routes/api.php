<?php

use App\Http\Controllers\API\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/product',[ProductController::class,'product']);
Route::post('/product-list',[ProductController::class,'list']);
