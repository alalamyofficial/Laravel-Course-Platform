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
            $subscriptions_count = DB::table('subscriptions')->latest()->get()->count();

        }else{
            abort(404);
        }
        
        return view('admin.subscriptions.show',compact('subscriptions','subscriptions_count'));        

    }
    
    public function destroy($id){

        $subscription = DB::table('subscriptions')->where('id',$id)->delete();

        return redirect()->back()->with('error','Mail Deleted Successfully');
    }

}
