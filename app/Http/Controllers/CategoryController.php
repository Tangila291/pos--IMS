<?php

namespace App\Http\Controllers;
use App\Models\Category;


use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category()
    {
        $allCategory=Category::paginate(5);

        return view('backend.category',compact('allCategory'));
    }
    public function form()
    {
        return view('backend.categoryform');
    }
    public function store(Request $request)
    {
        
        Category::create([
            
            'name'=>$request->cat_name,
            'description'=>$request->cat_description
        ]);
        return redirect()->back();

    }
}
