<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class CommentController extends Controller
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
    public function create($post_id)
    {
        $post = Post::find($post_id);
        return view('Comment.CommentCreate', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::id();
        $comment = new Comment;
        $comment->content = Input::get('content');
        $comment->user_id = $user;
        $comment->post_id = Input::get('post');
        $comment->save();

        return back();
    }

    public function replyStore(Request $request)
    {
        $user = Auth::id();
        $comment = new Comment;
        $comment->content = Input::get('content');
        $comment->user_id = $user;
        $comment->post_id = Input::get('post');
        $comment->parent_id = Input::get('comment');
        $comment->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($post_id, $id)
    {
        $user = Auth::id();
        $post = Post::find($post_id);
        //$comment = Comment::find($id);
        $comments = $post->comments;

        return view('Comment.CommentShow', compact('comments', 'post', 'user'));
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
        //
    }
}
