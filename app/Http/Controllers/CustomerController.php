<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\Sale;



use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function list()
    {
        $allCustomer=Sale::paginate(5);
        return view('backend.customerlist',compact('allCustomer'));
    }
    
    public function form()
    {
        return view('backend.customerform');
    }
    public function store(Request $request)
    {
        Customer::create([
            'name'=>$request->customer_name,
            //'password'=>$request->customer_password,
            'address'=>$request->customer_address,
            'email'=>$request->customer_email,
            'mobile'=>$request->customer_mobile,
            'dob'=>$request->customer_dob
            //'image'=>$request->customer_image

        ]); 
        return redirect()->back();

    }
    
}
