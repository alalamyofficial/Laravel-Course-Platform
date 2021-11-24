<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class SubscriptionController extends Controller
{
    public function subscriptions(){
        
        if(auth()->user()->role_as == 10){
            
            $subscriptions = DB::table('subscriptions')->latest()->get();

        }else{
            abort(404);
        }
        
        return view('admin.subscriptions.show',compact('subscriptions'));        

    }
    
    public function destroy($id){

        $subscription = DB::table('subscriptions')->where('id',$id)->delete();

        return redirect()->back();
    }

}
