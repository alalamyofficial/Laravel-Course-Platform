<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Series;
use Session;
use App\Category;
use App\Video;
use Auth;

class VideoController extends Controller
{

    public function videos(){

        //for categories
        if(auth()->user()->role_as == 10){

            $categories = Category::latest()->get();

        }elseif(auth()->user()->role_as == 1){
            
            $userId = request()->user()->id;

            $categories = Category::where('user_id',$userId)->latest()->get();
        }else{
            return 'you have no authorization to go to here';
        }


        //For Series
        if(auth()->user()->role_as == 10){

            $series = Series::latest()->get();

        }elseif(auth()->user()->role_as == 1){
            
            $userId = request()->user()->id;

            $series = Series::where('user_id',$userId)->latest()->get();
        }else{
            return 'you have no authorization to go to here';
        }


        //For Video
        if(auth()->user()->role_as == 10){

            $videos = Video::latest()->get();
            $videos_count = Video::all()->count();

        }elseif(auth()->user()->role_as == 1){
            
            $userId = request()->user()->id;

            $videos = Video::where('user_id',$userId)->latest()->get();
            $videos_count = Video::where('user_id',$userId)->latest()->get()->count();

        }else{
            return 'you have no authorization to go to here';
        }

        


        return view('admin.videos.show',compact('series','categories','videos','videos_count'));

    }

    public function add_video(){

        //for categories
        if(auth()->user()->role_as == 10){

            $categories = Category::latest()->get();

        }elseif(auth()->user()->role_as == 1){
            
            $userId = request()->user()->id;

            $categories = Category::where('id',$userId)->latest()->get();
        }else{
            return 'you have no authorization to go to here';
        }


        //For Series
        if(auth()->user()->role_as == 10){

            $series = Series::latest()->get();

        }elseif(auth()->user()->role_as == 1){
            
            $userId = request()->user()->id;

            $series = Series::where('user_id',$userId)->latest()->get();
        }else{
            return 'you have no authorization to go to here';
        }

        return view('admin.videos.create',compact('series','categories'));

    }

    public function store(Request $request){

        $this->validate($request,[

            'title' => 'required|min:3',
            'description' => 'required|min:3',
            'video' => 'required',
            'series_id' => 'required',

        ]);

        $series = Series::all();

        if($series->count()==0){

            return redirect()->route('admin.series.create');

        }


        $video = $request->video;

        $new_video = time().$video->getClientOriginalName();

        $video->move('public/videos/',$new_video);



        Video::create([

            'title' => $request->title,
            'user_id' => Auth::id(),
            'description' => $request->description,
            'episode_number' => $request->episode_number,
            'series_id' => $request->series_id,
            "video"  => 'public/videos/'.$new_video,

        ]);

        return redirect()->route('admin.videos')->with('success','Video Uploaded Successfully !');

    }

    public function edit(Video $video , $id){

        $video = Video::find($id);
        $categories = Category::all();
        $series = Series::all();


        return view('admin.videos.edit',compact('video','series','categories'));
    }

    public function update(Request $request , $id){

        $this->validate($request,[

            'title' => 'required|min:3',
            'description' => 'required|min:3',
            'video' => 'required',
            'series_id' => 'required',

        ]);

        $video = Video::find($id);


        $video_upload = $request->video;

        $new_video = time().$video_upload->getClientOriginalName();

        $video_upload->move('public/videos/',$new_video);


        $update_video = [

            'title' => $request->title,
            'description' => $request->description,
            'series_id' => $request->series_id,
            "video"  => 'public/videos/'.$new_video,

        ];

        $video->update($update_video);

        return redirect()->route('admin.videos')->with('info','Video Updated Successfully !');

    }

    public function destroy($id){

        $video = Video::findOrFail($id);

        $video->destroy($id);

        return redirect()->back()->with('error','Video Deleted Successfully');

    }

}
