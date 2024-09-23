<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminuserController extends Controller
{
    public function user()
    {
        return view('backend.adminprofile');
    }
}
