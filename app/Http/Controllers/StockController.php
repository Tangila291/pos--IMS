<?php

namespace App\Http\Controllers;
use App\Models\Product;


use Illuminate\Http\Request;

class StockController extends Controller
{
    public function stock()
    {
        $allStock=Product::where('quantity','>',0)->get();
        return view('backend.stocklist',compact('allStock'));
    }
    public function delete($id)
     {
        $stock=Product::find($id);
        $stock->update([
            'quantity'=>0

            ]);

        notify()->success('Update successfully.');

        return redirect()->back();

     }
}
