<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comment;
use App\Video;

class CommentController extends Controller
{
    public function comments(){

        
        if(auth()->user()->role_as == 10){

            $comments = Comment::latest()->get();

        }elseif(auth()->user()->role_as == 1){

            $userId = request()->user()->id;
            $video = Video::where('user_id',$userId)->first();
            $comments = Comment::where('video_id',$video->id)->get();

        }
        else{
            abort(404);
        }


        return view('admin.comments.show',compact('comments'));

    }

    public function destroy($id){

        $comment = Comment::find($id);
        $comment->destroy($id);
        return back();

    }
}
