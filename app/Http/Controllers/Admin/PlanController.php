<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Plans;

class PlanController extends Controller
{
    public function plans(){

        if(auth()->user()->role_as == 10){

            $plans = Plans::latest()->get();

        }else{
            abort(404);
        }

        return view('admin.plans.show',compact('plans'));        

    }
}
