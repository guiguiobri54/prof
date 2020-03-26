<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $id= Auth::user()->id;

        $profile = User::find($id);

        return view('Profile.ProfileShow', compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('ProfileCreate');

        //


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'first_name'=> 'required|min:2|alpha',
            'last_name'=> 'required|min:2|alpha',
            'gender'=> 'required|in:male,female'
        ]);


        $profile =  User::find(auth()->id());
        $profile->gender = Input::get('gender');
        $profile->first_name = Input::get('first_name');
        $profile->last_name = Input::get('last_name');
        $profile->user_type = Input::get('statut');
        $profile->save();

        $path = config('users.path');
        $user_name = Auth::user()->name;
        $user_directory = $path . '/' . $user_name;

        if(!File::exists($user_directory)){
            File::makeDirectory($user_directory);
        }

        if ($profile->user_type == 'teacher'){

            $role = User::find(auth()->id());
            $role->role = 2;
            $role->save();

            //return response('Profil crée, rôle mis à jour');
            return redirect('/Teacher/Home');

        }elseif ($profile->user_type == 'student'){

            $role = User::find(auth()->id());
            $role->role = 1;
            $role->save();

            //return response('Profil crée, rôle mis à jour');
            return redirect('/Student/Home');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

   /* public function MyProfile()
    {
        //$my_profile = auth()::user->(id);
        $my_profile = DB::table('profiles')->where('user_id', '=', auth()->id())->get;

        return view('ProfileShow', compact('my_profile'));
    }*/

    public function show($id)
    {
        //
       $profile = Profile::findorfail($id);


        return view( 'ProfileShow ', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $profile= Profile::findorfail($id);

        return view('ProfileCreate', $profile );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'first_name'=> 'required|min:2|alpha',
            'last_name'=> 'required|min:2|alpha',
            'gender'=> 'required|in:male,female'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $profile=Profile::find($id);
        $profile->delete();

        $path = config('users.path');
        $user_name = Auth::user()->name;
        $user_directory = $path . '/' . $user_name;

        if(!File::exists($user_directory)){
            File::deleteDirectory($user_directory);
        }


        return redirect ('/');
    }
}
