<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DefaultUserController extends Controller
{
    public function home()
    {
        return view('/(role 0)DefaultUserViews.DefaultUserHome');
    }
    //
}
