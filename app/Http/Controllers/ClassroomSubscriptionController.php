<?php

namespace App\Http\Controllers;

use App\Classroom;
use App\ClassroomSubscription;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ClassroomSubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $classroom_id = Classroom::find($id);
        $ClassroomSub = ClassroomSubscription::all();
        //dd($classroom_id);
        return view('ClassroomSubscription.ClassroomSubscriptionIndex', compact('ClassroomSub'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $classroom = Classroom::find($id);
        //dd($classroom_id);
        return view('ClassroomSubscription.ClassroomSubscriptionCreate', compact('classroom'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $id = Auth::id();
        $user = User::find($id);
        $subscription = new ClassroomSubscription;
        $subscription->message = Input::get('message');
        $subscription->user_id = Auth::id();
        $subscription->first_name = $user->first_name;
        $subscription->last_name = $user->last_name;
        $subscription->classroom_id =Input::get('classroom');
        $subscription->save();

        return redirect(route('Classroom.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subscription = ClassroomSubscription::findorfail($id);
        $subscription->delete();

        return back();
    }
}
