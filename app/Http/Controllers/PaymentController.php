<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plans;
use Auth;

class PaymentController extends Controller
{
    public function index(){

        $data = [

            'intent' => auth()->user()->createSetupIntent()

        ];

        return view('platform.subscriptions.payment')->with($data);

    }

    public function store(Request $request,Plans $plan){

        $this->validate($request, [
            'token' => 'required'
        ]);

        if(Auth::user()->subscribed('default')) {
            return redirect()->route('home')->with('success', 'You have already subscribed the plan');
        }else{
            
            $plan = Plans::where('identifier', $request->plan)
                // ->orWhere('identifier', 'basic')
                ->first();
            
            $request->user()->newSubscription('default', $plan->stripe_id)->create($request->token);

            return back();
        }


    }

}
