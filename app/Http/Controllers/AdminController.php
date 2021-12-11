<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use App\Category;
use App\Series;
use App\Video;
use App\Rating;
use App\Plans;
use App\Comment;
use App\Setting;
use App\User;
use Auth;
use DB;

class AdminController extends Controller
{

    public function dashboard(){

        if(auth()->user()->role_as == 10){

            $categories_count = Category::all()->count();
            $videos_count = Video::all()->count();
            $series_count = Series::all()->count();
            $comments_count = Comment::all()->count();

        }elseif(auth()->user()->role_as == 1){
            
            $userId = request()->user()->id; 
            // $userId = Auth::id(); 

            $categories_count = Category::all()->count();
            $videos_count = Video::where('user_id',$userId)->latest()->get()->count();
            $series_count = Series::where('user_id',$userId)->latest()->get()->count();

            $video = Video::where('user_id',$userId)->first();
            $comments_count = Comment::where('video_id',$video->id)->get()->count();


        }else{
            abort(404);
        }


        return view('admin.dashboard',compact('categories_count','videos_count','series_count','comments_count'));

    }


    public function showLoginForm(){

        return view('admin.login');

    }





}