<?php

namespace App\Http\Controllers;

use App\Classroom;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $classroom = Classroom::find($id);
        //réutilisation de l'autorisation de classroom update
        $this->authorize('update', $classroom);

        return view('Post.PostCreate',compact('classroom'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request)
    {
        $this->validate($request,[
            'title'=>'required|max:100',
        ]);

        $post= new Post;
        $post->title = Input::get('title');
        $post->content = Input::get('content');
        $post->classroom_id = Input::get('classroom');
        $post->save();

        return redirect(route('Classroom.show', [$post->classroom_id]));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($class, $po)
    {
        $post = Post::find($po);
        $classroom = $post->classroom;
        $comments = $post->comments;


        //réutilisation de l'autorisation de classroom view
        $this->authorize('view', $classroom);


        return view('Post.PostShow', compact('post', 'classroom', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($class, $po)
    {
        $post = Post::find($po);
        $classroom = Classroom::find($class);

        $this->authorize('update',$post);

        return view('Post.PostEdit', compact('post', 'classroom'));

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
            'title'=>'required|max:100',
        ]);

        $post = Post::findorFail($id);


        $post->title = Input::get('title');
        $post->content = Input::get('content');
        $post->save();

        $classroom = $post->classroom;

        return redirect(route('Classroom.show', [$classroom->id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findorFail($id);
        $this->authorize('delete', $post);
        $post->delete();

        return back();
    }
}
