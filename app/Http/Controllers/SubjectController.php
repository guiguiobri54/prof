<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Subject;

use App\Http\Requests;

use Illuminate\Support\Facades\Input;




class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        protected $subject;

    /**
     * @return mixed
     */


    public function index()
    {
        //

        $subjects=Subject::all();
        return view('SubjectIndex', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('SubjectCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'attribute' => 'sometimes'
        ]);


        /*
        $subject= new Subject(['name', 'attribute']);

        $subject->name = $request->name;
        $subject->attibute = $request->attribute;

       $request->all()->save; */

        $subject = new Subject;
        $subject->name = Input::get('name');
        $subject->attribute = Input::get('attribute');
        $subject->save();


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
        $subject = Subject::findorfail($id);
        return view ('SubjectEdit', compact('subject'));
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
        $subject = Subject::Find($id);

        $subject->name = $request->get('name');
        $subject->attribute = $request->get('attribute');
        $subject->save();

        return view('UpdatedSubject');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $subject=Subject::find($id);
        $subject->delete();

        return back();
    }


}
