<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Series;
use Session;
use App\Category;
use Str;
use Auth;

class SeriesController extends Controller
{
    public function series(){

        //for categories

        $categories = Category::latest()->get();


        //For Series
        if(auth()->user()->role_as == 10){

            $series = Series::latest()->get();

        }elseif(auth()->user()->role_as == 1){
            
            $userId = request()->user()->id;

            $series = Series::where('user_id',$userId)->latest()->get();
        }else{
            abort(404);
        }

        return view('admin.series.show',compact('series','categories'));

    }

    public function add_series(){


        $categories = Category::latest()->get();

        return view('admin.series.create',compact('categories'));

    }

    public function store(Request $request){

        $this->validate($request,[

            'title' => 'required|min:3',
            'description' => 'required|min:3',
            'image' => 'sometimes',
            'category_id' => 'required',
            'plan' => 'required',

        ]);

        $categories = Category::all();

        if($categories->count()==0){

            return redirect()->route('admin.category.create');

        }


        $image = $request->image;

        $new_image = time().$image->getClientOriginalName();

        $image->move('public/series/',$new_image);


        Series::create([

            'title' => $request->title,
            'user_id' => Auth::id(),
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'category_id' => $request->category_id,
            'plan' => $request->plan,
            "image"  => 'public/series/'.$new_image,

        ]);

        return redirect()->route('admin.series')->with('success','Series Created Successfully !');

    }

    public function edit(Series $series , $id){

        $series = Series::find($id);
        $categories = Category::all();

        return view('admin.series.edit',compact('series','categories'));
    }

    public function update(Request $request , $id){


        $this->validate($request,[
            'title' => 'required|min:3',
            'description' => 'required|min:3',
            'image' => 'sometimes',
            'category_id' => 'required',
        ]);

        $series = Series::find($id);
        
        $image = $request->image;

        $new_image = time().$image->getClientOriginalName();

        $image->move('public/series/',$new_image);


        $update_series = [

            'title' => $request->title,
            'user_id' => Auth::id(),
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'category_id' => $request->category_id,
            "image"  => 'public/series/'.$new_image,

        ];

        $series->update($update_series);


        return redirect()->route('admin.series')->with('info','Series Updated Successfully !');   

    }

}
