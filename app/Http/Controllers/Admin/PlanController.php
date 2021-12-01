<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Plans;

class PlanController extends Controller
{
    public function create(){

        return view('admin.plans.create');

    }

    public function plans(){

        if(auth()->user()->role_as == 10){

            $plans = Plans::latest()->get();
            $plans_count = Plans::all()->count();

        }else{
            abort(404);
        }

        return view('admin.plans.show',compact('plans','plans_count'));        

    }

    public function store(Request $request){

        $this->validate($request,[
            'title' => 'required',
            'identifier' => 'required',
        ]);

        $stripe_id;

        if($request->identifier == 'basic'){
            
            $stripe_id = 'price_1Jw2tgGEYw9Rnssy7diIL7io';
        }
        elseif($request->identifier == 'premium'){
            
            $stripe_id = 'price_1Jw2tgGEYw9RnssyjHUF6NPQ';
        }
        elseif($request->identifier == 'gold'){
            
            $stripe_id = 'price_1Jw8BBGEYw9RnssyyaAnWRJr';
        }

        $plan = Plans::create([

            'title' => $request->title,
            'identifier' => $request->identifier,
            'stripe_id' => $stripe_id

        ]);

        return redirect()->route('admin.plans')->with('success','Video Uploaded Successfully !');

    }

    public function edit($id){

        $plan = Plans::findOrFail($id);

        return view('admin.plans.edit',compact('plan'));        

    }

    public function update(Request $request , $id){

        $plan = Plans::findOrFail($id);

        $this->validate($request,[
            'title' => 'required',
            'identifier' => 'required',
        ]);

        $stripe_id;

        if($request->identifier == 'basic'){
            
            $stripe_id = 'price_1Jw2tgGEYw9Rnssy7diIL7io';
        }
        elseif($request->identifier == 'premium'){
            
            $stripe_id = 'price_1Jw2tgGEYw9RnssyjHUF6NPQ';
        }
        elseif($request->identifier == 'gold'){
            
            $stripe_id = 'price_1Jw8BBGEYw9RnssyyaAnWRJr';
        }

        $update_plan = [

            'title' => $request->title,
            'identifier' => $request->identifier,

        ];

        $plan->update($update_plan);

        return redirect()->back()->with('info','Plan Updated Succesfully');

    }

    public function destroy($id){

        $plan = Plans::findOrFail($id);

        $plan->delete($id);

        return redirect()->back()->with('danger','Plan Deleted Successfully');


    }

}
