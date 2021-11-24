<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('platform.site');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//admin

Route::group(['middleware' => ['auth','is_Admin']], function () {

    //Dashboard
    Route::get('admin/dashboard','AdminController@dashboard')->name('admin.dashboard');
    
    //Categories
    Route::get('admin/categories','Admin\CategoryController@categories')->name('admin.categories');
    Route::get('admin/create/category','Admin\CategoryController@add_category')->name('admin.category.create');
    Route::post('admin/store/category','Admin\CategoryController@store')->name('admin.category.store');
    Route::get('admin/edit/category/{id}','Admin\CategoryController@edit')->name('admin.category.edit');
    Route::patch('admin/update/category/{id}','Admin\CategoryController@update')->name('admin.category.update');
    Route::delete('admin/destroy/category/{id}','Admin\CategoryController@destroy')->name('admin.category.destroy');
    
    //Series
    Route::get('admin/series','Admin\SeriesController@series')->name('admin.series');
    Route::get('admin/create/series','Admin\SeriesController@add_series')->name('admin.series.create');
    Route::post('admin/store/series','Admin\seriesController@store')->name('admin.series.store');
    Route::get('admin/edit/series/{id}','Admin\SeriesController@edit')->name('admin.series.edit');
    Route::patch('admin/update/series/{id}','Admin\SeriesController@update')->name('admin.series.update');
    
    
    //Videos
    Route::get('admin/videos','Admin\VideoController@videos')->name('admin.videos');
    Route::get('admin/create/video','Admin\VideoController@add_video')->name('admin.video.create');
    Route::post('admin/store/video','Admin\VideoController@store')->name('admin.videos.store');
    Route::get('admin/edit/video/{id}','Admin\VideoController@edit')->name('admin.video.edit');
    Route::patch('admin/update/update/{id}','Admin\VideoController@update')->name('admin.video.update');
    
    
    //Users
    Route::get('admin/users','Admin\UserController@users')->name('admin.users');
    Route::get('admin/create/user','Admin\UserController@add_user')->name('admin.user.create');
    Route::post('admin/store/user','Admin\UserController@store')->name('admin.user.store');

    
    //Ratings
    Route::get('admin/ratings','Admin\RatingController@ratings')->name('admin.ratings');

    //Plans
    Route::get('admin/plans','Admin\PlanController@plans')->name('admin.plans');

    //Subscription
    Route::get('admin/subscriptions','Admin\SubscriptionController@subscriptions')->name('admin.subscriptions');
    Route::get('admin/subscription/destroy/{id}','Admin\SubscriptionController@destroy')
            ->name('admin.subscription.destroy');

    //Comment        
    Route::get('admin/comments','Admin\CommentController@comments')->name('admin.comments');        
    Route::get('admin/comment/destroy','Admin\CommentController@destroy')->name('admin.comment.destroy');        

    //Settings
    Route::get('admin/settings','Admin\SettingsController@settings')->name('admin.settings');
    Route::patch('admin/settings/update','Admin\SettingsController@update')->name('admin.settings.update');
        

});





// site
Route::get('/','PlatformController@site')->name('site');
Route::get('/series/{slug}','PlatformController@one_series')->name('one_series');

Route::post('/rating/{series}', 'PlatformController@seriesStar')->name('seriesStar');
Route::post('update/rating/{user_id}', 'PlatformController@updateSeriesStar')->name('update.seriesStar');

//plans
Route::get('plans', 'SubscriptionController@index')->name('plans');

//courses
Route::get('/courses','PlatformController@courses')->name('courses');

//category Series
Route::get('/category/{name}/series','PlatformController@category_series')->name('category_series');

//Contact
Route::get('contact/us','PlatformController@contact')->name('contact');

//send Mail
Route::post('message/send','MailController@send_mail')->name('send.message');

//About
Route::get('about','PlatformController@about')->name('about');


Route::group(['middleware' => 'auth'], function () {
    
    //video
    Route::get('/series/{slug}/episode/{episode_number}','PlatformController@single_video')->name('single_video');
    
    //payments
    Route::get('/payments', 'PaymentController@index')->name('payments');
    Route::post('/payments', 'PaymentController@store')->name('payments.store');

    Route::post('/comment/store/{id}','CommentController@store')->name('comment.store');

});

