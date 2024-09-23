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
    public function viewcategory($id)
     {
        $category=Category::find($id);
        return view('backend.page.category_view',compact('category'));
     }
     public function edit($catid)
     {
        $category=Category::find($catid);

        return view('backend.page.category_edit',compact('category'));
     }
     public function Update(Request $request,$catid)
     {
        //Validation



        $category=Category::find($catid);
        $category->Update([
        'name'=>$request->cat_name,
        'description'=>$request->cat_description
        

        ]);

        notify()->success('Category updated successfully.');

        return redirect()->route('Category');



     }
     public function delete($id)
     {
        $category=Category::find($id);
        $category->delete();

        notify()->success('Product Deleted successfully.');

        return redirect()->back();

     }
}
