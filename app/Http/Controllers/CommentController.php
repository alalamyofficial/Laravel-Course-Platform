<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Auth;
use App\Video;
use App\User;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $this->validate($request,[

            'comment' => 'required'

        ]);

        $video = Video::find($id);

        $comment = new Comment;

        $comment->user_id = Auth::id();
        $comment->video_id = $video->id;
        $comment->comment = $request->comment;

        $comment->save();

        // return redirect()->back();
        return response()->json('Comment Added Succesfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment , Video $video)
    {
        $comments = Comment::where('video_id',$video->id)->latest()->get(); 

        return $comments;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment , $id)
    {
        $comment = Comment::find($id);
        $comment->delete();

        return response()->json("Comment Removed Successfully");
    }
}
