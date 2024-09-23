<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function product()
    {
        $product = Product::all();
        return response()->json($product);
    }
    public function list(Request $request)
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
          return response()->json([
            'success'=>false,
            'data'=>null,
            'message'=>$validation->getMessageBag(),
          ]);
        }

         $fileName=null;
       
        
        if($request->hasFile('product_image'))
        {
       
            $file=$request->file('product_image');

            
            $fileName=date('Ymdhis').'.'.$file->getClientOriginalExtension();

             
            $file->storeAs('/',$fileName);
       
        }

       


    $product=Product::create([
        'name'=>$request->product_name,
        'price'=>$request->product_price,
        'description'=>$request->product_description,
        'quantity'=>$request->product_quantity,
        'image'=>$fileName,
        'category_id'=>$request->category_id,
        'brand_id'=>$request->brand_id

    ]);

  return response()->json([
    'success'=>true,
    'data'=>$product,
  ]); 
    }
}
