<?php

namespace App\Http\Controllers;

use App\Classroom;
use App\Study;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class StudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {


        $studies = Study::all();



        return view('StudyIndex', compact('studies','filenames', 'docs'));

       // return view('StudiesList', compact('studies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('StudyCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$classroom = $request->route('id');


        $study= new Study;
        $study->name = Input::get('name');
        $study->classroom_id = Input::get('classroom_id');
        $study->save();

        return back();

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

        $exercices = $docs -> where('category', 'exercice');





        return view('StudyShow', compact('study', 'docs','annexes','lessons', 'exercices'));
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
        $study=Study::find($id);
        $study->delete();

        return back();
    }
}
