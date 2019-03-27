<?php

namespace App\Http\Controllers;

use App\Classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
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

    public function index()
    {
        //obtention de l'id de l'user:
        $id= Auth::user()->id;

        //recherche de cours par id de l'user:
        $classroom=User::find($id)->classrooms;



        return view('ClassroomIndex', compact('classroom'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ClassroomCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $classroom = new Classroom;
        $classroom->name = Input::get('name');
        $classroom->subject = Input::get('subject');
        $classroom->school = Input::get('school');
        $classroom->user_id = Auth::id();
        $classroom->save();


        return back()->with('message', 'enregistré');
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

       $studies = Classroom::find($id)->studies;

       $directory = config('files.path');


        $files = File::allFiles($directory);

       // $filename = $files('basename');





           // $filename = pathinfo($file, PATHINFO_BASENAME);
           // $filename = $files[pathinfo(File::allFiles($directory))[PATHINFO_BASENAME]] ;


        //dd($files);





        return view('ClassroomShow', compact('classroom','studies', 'files'));
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
        $classroom=Classroom::find($id);
        $classroom->delete();

        return back();
    }
}
