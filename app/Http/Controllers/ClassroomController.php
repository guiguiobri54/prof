<?php

namespace App\Http\Controllers;

use App\Classroom;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authorize;
use App\Policies\ClassroomPolicy;
use Illuminate\Database\Eloquent\Builder;
use App\User;
use App\Study;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $classroom;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //obtention de l'id de l'user:
        $id= Auth::user()->id;

        if (Auth::user()->role == '2'){

        //recherche de cours par id de l'user:
        $classroom=User::find($id)->classrooms;

        return view('Classroom.TeacherClassroomIndex', compact('classroom'));
        }
        else{
            $allClassrooms = Classroom::all();

            return view('Classroom.StudentClassroomIndex', compact('allClassrooms'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        //$role = User::find($id)->role;
        if ($user->can('create', Classroom::class))
        {
        return view('Classroom.ClassroomCreate');
        }
        return response('Unauthorized.', 401);
    }

    public function list($id)
    {
        //$classroom = Classroom::find($id)->name;
        $classroom = Classroom::find($id);
        $students = $classroom->attachedUsers()->paginate();
        //affiche la liste des etudiants
        $studNb = $classroom->attachedUsers()->count();
        //Compte du nb d'user attachés
        $reqNb = $classroom->classroom_subscriptions()->count();
        //dd($reqNb);


        return view('Classroom.ClassroomUsersList', compact('classroom', 'students', 'studNb', 'reqNb'));
    }

    public function banUser($class, $user)
    {
        $classroom = Classroom::findorfail($class);
        $user_id = User::findorfail($user)->id;
        //dd($user_id);
        $classroom->attachedUsers()->detach($user_id);

        return back();

    }
    public function join(Request $request)
    {
        $id= $request->classroom_id;

        $classroom = Classroom::find($id);

        $study = Input::get('study');


        $classroom->studies()->attach([$study]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:100',
            'subject'=>'max:100',
            'school'=>'max:150',
        ]);

        $id = Auth::id();
        $profile = User::find($id);
        if($profile->gender == 'female')
        {
            $prefix = 'Mme ';
        }else{
            $prefix = 'M. ';
        }

        $last_name = $profile->last_name;


        $classroom = new Classroom;
        $classroom->name = Input::get('name');
        $classroom->subject = Input::get('subject');
        $classroom->school = Input::get('school');
        $classroom->user_id = Auth::id();
        $classroom->creator = $prefix . $last_name;
        $classroom->save();


        return redirect('/Classroom');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $classroom = Classroom::findorfail($id);
        $this->authorize('view', $classroom);

       $studies = Classroom::find($id)->studies;
       $posts = $classroom->posts;

       $user_id=Auth::user()->id;
       $cours=User::find($user_id)->studies;
       $list= $cours->pluck('name', 'id');
       $tags=$cours->pluck('tag', 'id');


        return view('Classroom.ClassroomShow', compact('classroom','studies', 'list', 'tags','cours', 'posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $classroom = Classroom::findorFail($id);
        $this->authorize('update', $classroom);

        return view('Classroom.ClassroomEdit', compact('classroom'));
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
        $this->validate($request,[
            'name'=>'required|max:100',
            'subject'=>'max:100',
            'school'=>'max:150',
        ]);

        $classroom = Classroom::findorFail($id); 

        $classroom->name = $request->name;
        $classroom->subject = $request->subject;
        $classroom->school = $request->school;
        $classroom->save();

        return redirect(route('Classroom.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $classroom = Classroom::findOrfail($id);
        $this->authorize('delete', $classroom);
        $classroom->delete();

        return back();
    }
}
