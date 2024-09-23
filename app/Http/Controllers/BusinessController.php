<?php

namespace App\Http\Controllers;
use App\Models\Setting;

use Illuminate\Http\Request;

class BusinessController extends Controller
{
    public function settings()
    {
        $setting=Setting::find(1);

        return view('backend.settings',compact('setting'));
        
    }


    public function settingSubmit(Request $request)
    {

        $setting=Setting::find(1);
        $logoName=null;

        if($request->has('logo'))
        {
            $file=$request->file('logo');
            $logoName=date('ymdhis').'.'.$file->getClientOriginalExtension();
            $file->storeAs('/logo',$logoName);
        }

        if($setting)
        { 
            $setting->update([
                'logo'=>$logoName ?? $setting->logo,
                'name'=>$request->business_name,
                'address'=>$request->address,
                'contact_number'=>$request->contact,
            ]);
    
        }else{
            Setting::create([
                'logo'=>$logoName,
                'name'=>$request->business_name,
                'address'=>$request->address,
                'contact_number'=>$request->contact,
            ]);
    
        }

       
        notify()->success('Settings Updated.');

        return redirect()->back();
        
    }

}
