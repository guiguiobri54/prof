<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DefaultUserController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth');
    }

    public function home()
    {
        return redirect('/Profile/create');
    }
    //
}
