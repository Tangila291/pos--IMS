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
    public function edit($id)
     {
        $brand=Brand::find($id);

        return view('backend.page.brand_edit',compact('brand'));
     }
     public function Update(Request $request,$id)
     {



        $brand=Brand::find($id);
        $brand->Update([
        'name'=>$request->brand_name,
        'description'=>$request->brand_description
        

        ]);

        notify()->success('Brand updated successfully.');

        return redirect()->route('Brand');



     }
     public function delete($id)
     {
        $brand=Brand::find($id);
        $brand->delete();

        notify()->success('Deleted successfully.');

        return redirect()->back();

     }
}
