<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Session;
use Auth;

class CategoryController extends Controller
{
    public function categories(){

        if(auth()->user()->role_as == 10){

            $categories = Category::latest()->get();
            $categories_count = Category::all()->count();


        }else{
            abort(404);
        }

        return view('admin.categories.show',compact('categories','categories_count'));
    }

    
    public function add_category(){

        if(auth()->user()->role_as == 10){

            $categories = Category::latest()->get();

        }elseif(auth()->user()->role_as == 1){
            
            $userId = request()->user()->id;

            $categories = Category::where('user_id',$userId)->latest()->get();
        }else{
            return 'you have no authorization to go to here';
        }

        // $categories = Category::latest()->get();
        return view('admin.categories.create',compact('categories'));
    }

    public function store(Request $request)
    {

        $this->validate($request,[

            'name' => 'required|min:3'

        ]);

        Category::create([


            'name' => $request->name,
            'user_id' => Auth::id()

        ]);

        return redirect()->route('admin.categories')->with('success','Category Added Successfully');
    }

    public function edit(Request $request,$id){

        $category = Category::find($id);
        return view('admin.categories.edit',compact('category'));

    }

    public function update(Request $request,$id){

        $this->validate($request,[

            'name'=>'required'
        ]);

        $category = Category::find($id);

        $update_category = [
            'name' => $request->name
        ];

        $category->update($update_category);




        if(auth()->user()->role_as == 10){

            $categories = Category::latest()->get();

        }elseif(auth()->user()->role_as == 1){
            
            $userId = request()->user()->id;

            $categories = Category::where('user_id',$userId)->latest()->get();
        }else{
            return 'you have no authorization to go to here';
        }



        return redirect()->route('admin.categories',compact('categories'))->with('info','Category Updated Successfully');


    }

    public function destroy($id){

        $category = Category::findOrFail($id);

        $category->destroy($id);

        return redirect()->back()->with('error','Category Deleted Successfully');

    }

}
