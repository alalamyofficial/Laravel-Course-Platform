<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Series;
use App\Setting;
use App\Category;
use Auth;

class SearchController extends Controller
{
    public function search(Request $request){

        $key = trim($request->get('q'));


        if(Auth::check()){

            if(request()->user()->subscribed('default')) {
    
                if(request()->user()->subscription()->stripe_plan == 'price_1Jw2tgGEYw9RnssyjHUF6NPQ'){
    
                    $series = Series::latest()
                                ->where('title', 'LIKE', "%{$key}%") 
                                ->orWhere('slug', 'LIKE', "%{$key}%") 
                                ->orWhere('description', 'LIKE', "%{$key}%") 
                                ->where('plan','=','premium')
                                ->orWhere('plan','=','basic')
                                ->orWhere('plan','=','free')
                                ->get();
    
                }elseif(request()->user()->subscription()->stripe_plan == 'price_1Jw2tgGEYw9Rnssy7diIL7io'){
    
                    $series = Series::latest()
                                ->where('title', 'LIKE', "%{$key}%") 
                                ->orWhere('slug', 'LIKE', "%{$key}%") 
                                ->orWhere('description', 'LIKE', "%{$key}%") 
                                ->where('plan','=','basic')
                                ->where('plan','=','free')
                                ->get();
    
                }elseif(request()->user()->subscription()->stripe_plan == 'price_1Jw8BBGEYw9RnssyyaAnWRJr'){
    
                    $series = Series::latest()
                                ->where('title', 'LIKE', "%{$key}%") 
                                ->orWhere('slug', 'LIKE', "%{$key}%") 
                                ->orWhere('description', 'LIKE', "%{$key}%") 
                                ->where('plan','=','gold')
                                ->where('plan','=','premium')
                                ->orWhere('plan','=','basic')
                                ->orWhere('plan','=','free')
                                ->get();
    
                }else {
                    
                    $series = Series::latest()->where('plan','=','free')->get();
    
                }
    
    
    
            }else{
    
                $series = Series::query()
                    ->where('plan','=','free')
                    ->where('title', 'LIKE', "%{$key}%") 
                    ->orWhere('slug', 'LIKE', "%{$key}%") 
                    ->orWhere('description', 'LIKE', "%{$key}%") 
                    ->get();            
            }
        }else{

            $series = Series::latest()->get();
        }

        $categories = Category::latest()->limit(5)->get();

        $one_series = Series::first();

        $settings = Setting::latest()->limit(1)->first();


        return view('platform.series.courses',compact('series','categories','one_series','settings'));
    }



}
