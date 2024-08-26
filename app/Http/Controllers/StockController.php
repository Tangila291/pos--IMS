<?php

namespace App\Http\Controllers;
use App\Models\Product;


use Illuminate\Http\Request;

class StockController extends Controller
{
    public function stock()
    {
        $allStock=Product::all();
        return view('backend.stocklist',compact('allStock'));
    }
}
