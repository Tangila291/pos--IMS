<?php

namespace App\Http\Controllers;
use App\Models\Brand;


use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function brand()
    {
        $allBrand=Brand::paginate(5);

        return view('backend.brandlist',compact('allBrand'));
    }
    public function form()
    {
        return view('backend.brandform');
    }
    public function store(Request $request)
    {
        Brand::create([
            'name'=>$request->brand_name,
            'description'=>$request->brand_description


        ]);
        return redirect()->back();

    }
}
