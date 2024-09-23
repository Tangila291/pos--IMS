<?php

namespace App\Http\Controllers;
use App\Models\Category;

use App\Models\Product;
use App\Models\Brand;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{
    public function product()
    {
        $allProduct=Product::with('category')->paginate(5);

        return view('backend.product',compact('allProduct'));
    }
    public function form()
    {
        $allCategory=Category::all();
        $allBrand=Brand::all();

        return view('backend.productform',compact('allCategory','allBrand'));
    }
    public function store(Request $request)
    {
        $validation=Validator::make($request->all(),[
            'product_name'=>'required',
            'product_price'=>'required|numeric|min:10',
            'product_description'=>'required',
            'product_quantity'=>'required',
            'product_image'=>'required|file|max:1024',
            'category_id'=>'required',
            'brand_id'=>'required'

            
        ]);

        if($validation->fails())
        {
            notify()->error($validation->getMessageBag());
            return redirect()->back();
        }

         $fileName=null;
       
        
        if($request->hasFile('product_image'))
        {
       
            $file=$request->file('product_image');

            
            $fileName=date('Ymdhis').'.'.$file->getClientOriginalExtension();

             
            $file->storeAs('/',$fileName);
       
        }

       


    Product::create([
        'name'=>$request->product_name,
        'price'=>$request->product_price,
        'description'=>$request->product_description,
        'quantity'=>$request->product_quantity,
        'image'=>$fileName,
        'category_id'=>$request->category_id,
        'brand_id'=>$request->brand_id

    ]);

    notify()->success('product added');
    return redirect()->route('Product');

}
     public function viewproduct($id)
     {
        $product=Product::find($id);
        return view('backend.page.product_view',compact('product'));
     }
     public function edit($proid)
     {
        $product=Product::find($proid);
        $allCategory=Category::all();

        return view('backend.page.product_edit',compact('allCategory','product'));
     }
     public function Update(Request $request,$proid)
     {
        //Validation

        $product=Product::find($proid);
        $product->Update([
        'name'=>$request->product_name,
        'price'=>$request->product_price,
        'description'=>$request->product_description,
        'quantity'=>$request->product_quantity

        ]);

        notify()->success('Product updated successfully.');

        return redirect()->route('Product');



     }
     public function delete($id)
     {
        $product=Product::find($id);
        $product->delete();

        notify()->success('Product Deleted successfully.');

        return redirect()->back();

     }



}
