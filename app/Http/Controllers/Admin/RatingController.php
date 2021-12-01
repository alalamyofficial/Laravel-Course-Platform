<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rating;
use App\Series;
use App\User;

class RatingController extends Controller
{
    public function ratings(){

        if(auth()->user()->role_as == 10){

            $ratings = Rating::latest()->get();
            $ratings_count = Rating::all()->count();

        }elseif(auth()->user()->role_as == 1){

            $userId = request()->user()->id;
            $series = Series::where('user_id',$userId)->first();
            $ratings = Rating::where('rateable_id',$series->id)->latest()->get();
            $ratings_count = Rating::where('rateable_id',$series->id)->latest()->get()->count();

        }
        else{
            abort(404);
        }

        return view('admin.ratings.show',compact('ratings','ratings_count'));

    }
}
