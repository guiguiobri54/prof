<?php

namespace App\Http\Controllers;

use App\Classroom;
use App\Study;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class StudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {


        $studies = Auth::user()->studies;
       //if (isset($studies)) {
        foreach ($studies as $study){
        $tags = $study->pluck('tag');

       // }
        $studies= $studies->sortBy('name')->sortby('tag');
        }
        //$tags='none';

        //$etiquettes = str_replace(' ', '',$studies);




        return view('Study.StudyIndex', compact('studies','filenames', 'docs', 'tags', 'etiquettes'));

       // return view('StudiesList', compact('studies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Study.StudyCreate');
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
            'name'=>'required|max:150',
            'tag'=>'max:60',
        ]);


        $study= new Study;
        $study->name = Input::get('name');
        $study->tag = Input::get('tag');
        $study->user_id = Auth::user()->id;
        $study->save();

        $path = config('users.path');
        $user_name = Auth::user()->name;
        $user_directory = $path . '/' . $user_name;

        $id = $study->id;

        //dd($id);

        $study_directory = $user_directory . '/' . $id;

        if(!File::exists($study_directory)){
            File::makeDirectory($study_directory);
        }


        return redirect('/Study');

    }

    public function attach(Request $request)
    {
        $id= $request->classroom_id;

        $classroom = Classroom::find($id);

        $study = Input::get('study');


        $classroom->studies()->syncWithoutDetaching([$study]);

        return Redirect::back();
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $study = Study::findorfail($id);

        $docs = Study::find($id)->documents;

        $lessons = $docs -> where('category', 'lesson');

        $annexes = $docs-> where('category','annexe');

        $exercises = $docs -> where('category', 'exercise');





        return view('Study.StudyShow', compact('study', 'docs','annexes','lessons', 'exercises'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $study = Study::findorFail($id);

        return view('Study.StudyEdit',compact('study'));
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

            'name'=>'required|max:150',
            'tag'=>'max:60',

            ]);

        $study = Study::findorfail($id);
        $study->name = $request->name;
        $study->tag = $request->tag;
        $study->save();

        return redirect(route('Study.show', [$id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $path = config('users.path');
        $user_name = Auth::user()->name;
        $user_directory = $path . '/' . $user_name;

        $study=Study::find($id);
        $id = $study->id;

        $study_directory = $user_directory . '/' . $id;

        //dd($study_directory);

        if (File::exists($study_directory)) {
            File::deleteDirectory($study_directory);
        }



        //$name=$study->name;

        $study->delete();



        return redirect('/Study');
    }
}
