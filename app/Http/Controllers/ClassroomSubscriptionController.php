<?php

namespace App\Http\Controllers;

use App\Classroom;
use App\ClassroomSubscription;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $classroom = Classroom::find($id);
        //$ClassroomSub = ClassroomSubscription::all();
        $classroom_id = Classroom::find($id)->id;
        //recup de l'id classroom
        $ClassroomSub =Classroom::find($classroom_id)->classroom_subscriptions;
        //dd($ClassroomSub);
        return view('ClassroomSubscription.ClassroomSubscriptionIndex', compact('classroom','ClassroomSub'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $classroom = Classroom::find($id);
        //recupération de l'id classroom
        $class_id = $classroom->id;

        $user= Auth::user()->id;

        if($sub= DB::table('classroom_subscriptions')
            ->where('classroom_id', $class_id)
            ->where('user_id', $user)->count()>0
            or $attached = $classroom->whereHas('attachedUsers', function (Builder $query){
                    $user=Auth::user();
                    $query->where('email', $user->email);
                })->count()>0){

            return back();
        }

       /* $existe= DB::table('classroom_subscriptions')
            ->where('classroom_id',$class_id)
            ->where('user_id', $user)
            ->get();

        //dd($existe);

        if(count($existe) > 0){
            //vérification de l'existence d'une requete d'admission existante
            return back();
        }*/
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

    public  function accept($class, $sub, $user_id)
    {
        $classroom = Classroom::find($class);
        $subscription = ClassroomSubscription::findorfail($sub);
        $user = User::find($user_id)->id;
        //dd($user);
        $classroom->attachedUsers()->syncWithoutDetaching([$user]);
        $subscription->delete($sub);

        return back();
    }

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
