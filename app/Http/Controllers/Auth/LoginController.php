<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticated(Request $request, $user)
    {

        if($user->isAdmin()) {
            $this->redirectTo = '/Admin/Home';
        }elseif ($user->isHeadmaster()){
            $this->redirectTo = '/Headmaster/Home';
        }elseif ($user->isTeacher()){
            $this->redirectTo = '/Teacher/Home';
        }elseif ($user->isStudent()){
            $this->redirectTo = '/Student/Home';
        }elseif ($user->isDefaultUser()){
            $this->redirectTo = '/DefaultUser/Home';
        }
    }
}
