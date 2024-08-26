<?php

namespace App\Http\Controllers;
use App\Models\SaleDetail;
use App\Models\Sale;
use App\Models\Product;




use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
     $customerCount=Sale::count();
     $totalSale=Sale::sum('total_amount');
     $totalProduct=Product::count();


    //dd($customerCount);
    return view('backend.dashboard',compact('customerCount','totalSale','totalProduct'));
    }
}
