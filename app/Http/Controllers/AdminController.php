<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function home()
    {
        return view('(role 4)AdminViews.AdminHome');
    }
    //
}
