<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Cashier\Billable;
use RealRashid\SweetAlert\Facades\Alert;
use App\Category;
use App\Series;
use App\Video;
use App\Rating;
use App\Plans;
use App\Comment;
use App\Setting;
use App\User;
use Auth;
use DB;
use URL;

class PlatformController extends Controller
{
    use Billable;



    public function site(){

        $categories = Category::latest()->limit(5)->get();
        $series = Series::latest()->where('plan','=','free')->limit(10)->get();
        $series_id = Series::first()->id;
        $one_series = Series::where('id',$series_id)->first();
        $series_ratings_count = Rating::where('rateable_id',$one_series->id)->count();
        $plans = Plans::get();
        $settings = Setting::latest()->limit(1)->first();

        return view('platform.site',compact('categories','series','plans','settings','series_ratings_count'));

    }

    public function one_series($slug){

        $series = Series::where('slug',$slug)->first();
        $categories = Category::latest()->limit(5)->get();
        $one_video = Video::latest()->first();
        $first_video = $series->videos()->first();
        $settings = Setting::latest()->limit(1)->first();


        if(Auth::guard()){
            $ratings = Rating::where('user_id',request()->user()->id)->first();
        }else{
            return 'nope';
        }

        $series_videos = $series->videos()->get();

        $rating = Rating::first(); 
        
        // $getID3 = new \getID3;
        // $file = $getID3->analyze($video_path);
        // $duration = date('H:i:s.v', $file['playtime_seconds']);
        
        $current_url = Url::current();

        return view('platform.series.course_details',
        compact('categories','series','one_video','first_video',
        'ratings','rating','series_videos','settings','current_url'));

    }

    public function single_video(Request $request , $slug , $episode_number){

        $series = Series::where('slug',$slug)->first();
        $categories = Category::latest()->limit(5)->get();
        $one_video = $series->videos()->where('episode_number',$episode_number)->first();
        $settings = Setting::latest()->limit(1)->first();

        $video_duration = $series->videos()->where('episode_number',$episode_number)->first();



        $seriesID = $request->series_id;

        $videos = $series->videos()->paginate(1);

        $series_videos = $series->videos()->get();

        $vids= Video::where('episode_number', $episode_number)->get();


        $nextVideo= $series->videos()->where('episode_number', $episode_number+1)->first();


        $prevVideo = Video::where('episode_number','<', $one_video->episode_number )
                            ->orderBy('episode_number','desc')
                            ->first();
        

        $first_video = $series->videos()->where('episode_number','=', $episode_number)->first();
        $last_video = $series->videos()->latest()->first() ?? null;


        $comments = Comment::where('video_id',$one_video->id)->latest()->get(); 

        $current_url = URL::current();

        $current_video = $series->videos()->where('episode_number','=', $episode_number)->first();

        return view('platform.series.video',
            compact(
                'categories','series','one_video','videos',
                'nextVideo','prevVideo','first_video','last_video',
                'series_videos','settings','comments','video_duration'
                ,'current_url','current_video','vids'
            )
        );        


    }


    public function seriesStar (Request $request, Series $series) {
        $rating = new Rating;
        $rating->user_id = Auth::id();
        $rating->rating = $request->input('star');
        $rating->feedback = $request->feedback;
        $series->ratings()->save($rating);
        toast('Your Rating has Been Successfully!','success');
        return redirect()->back();
    }

    
    // public function updateSeriesStar (Request $request, $user_id) {


    //     $rating = DB::table('ratings')->where('user_id',$user_id)->first();

    //     $rating->destroy($user_id);

    //     return redirect()->back();
    // }

    public function plans() {
        $plans = Plans::get();
        return view('plan', compact('plans'));
    }

    public function courses(){
        
        if(Auth::check()){

            if(request()->user()->subscribed('default')) {
    
                if(request()->user()->subscription()->stripe_plan == 'price_1Jw2tgGEYw9RnssyjHUF6NPQ'){
    
                    $series = Series::latest()
                                ->where('plan','=','premium')
                                ->orWhere('plan','=','basic')
                                ->orWhere('plan','=','free')
                                ->get();
    
                }elseif(request()->user()->subscription()->stripe_plan == 'price_1Jw2tgGEYw9Rnssy7diIL7io'){
    
                    $series = Series::latest()
                                ->where('plan','=','basic')
                                ->where('plan','=','free')
                                ->get();
    
                }elseif(request()->user()->subscription()->stripe_plan == 'price_1Jw8BBGEYw9RnssyyaAnWRJr'){
    
                    $series = Series::latest()
                                    ->where('plan','=','gold')
                                    ->where('plan','=','premium')
                                    ->orWhere('plan','=','basic')
                                    ->orWhere('plan','=','free')
                                    ->get();
    
                }else {
                    
                    $series = Series::latest()->where('plan','=','free')->get();
    
                }
    
    
    
            }else{
    
                $series = Series::latest()->where('plan','=','free')->get();
            }
        }else{

            $series = Series::latest()->where('plan','=','free')->get();
        }

        $categories = Category::latest()->limit(5)->get();

        $one_series = Series::first();

        $settings = Setting::latest()->limit(1)->first();


        return view('platform.series.courses',compact('series','categories','one_series','settings'));
    }


    public function category_series($name){

        $categories = Category::latest()->limit(5)->get();

        $category = Category::where('name',$name)->first();

        $category_series = $category->series()->where('plan','=','free')->latest()->get();
        $series = Series::latest()->where('plan','=','free')->limit(10)->get();
        $plans = Plans::get();
        $settings = Setting::latest()->limit(1)->first();

        return view('platform.categories.series_categories',
        compact('categories','series','plans','category_series','settings'));

    }

    public function contact(){

        $settings = Setting::latest()->limit(1)->first();
        $categories = Category::latest()->limit(5)->get();

        return view('platform.contact',compact('categories','settings'));

    }

    public function about(){

        $settings = Setting::latest()->limit(1)->first();
        $categories = Category::latest()->limit(5)->get();

        return view('platform.about',compact('categories','settings'));

    }

    public function authors_series($slug){

        $user_id = request()->user()->id;

        $user = User::where('id',$user_id)->where('role_as','=',1);

        $author_series = $user->series()->lastest()->get();

        return view('platform.series.author_courses',compact('author_series'));


    }

}
