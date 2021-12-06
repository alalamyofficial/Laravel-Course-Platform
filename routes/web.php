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

Route::group(['middleware' => ['auth','is_Admin'], 'prefix' => 'admin'] ,function () {

    //Dashboard
    Route::get('dashboard','AdminController@dashboard')->name('admin.dashboard');
    
    //Categories
    Route::get('categories','Admin\CategoryController@categories')->name('admin.categories');
    Route::get('create/category','Admin\CategoryController@add_category')->name('admin.category.create');
    Route::post('store/category','Admin\CategoryController@store')->name('admin.category.store');
    Route::get('edit/category/{id}','Admin\CategoryController@edit')->name('admin.category.edit');
    Route::patch('update/category/{id}','Admin\CategoryController@update')->name('admin.category.update');
    Route::delete('destroy/category/{id}','Admin\CategoryController@destroy')->name('admin.category.destroy');
    
    //Series
    Route::get('series','Admin\SeriesController@series')->name('admin.series');
    Route::get('create/series','Admin\SeriesController@add_series')->name('admin.series.create');
    Route::post('store/series','Admin\seriesController@store')->name('admin.series.store');
    Route::get('edit/series/{id}','Admin\SeriesController@edit')->name('admin.series.edit');
    Route::patch('update/series/{id}','Admin\SeriesController@update')->name('admin.series.update');
    Route::delete('delete/series/{id}','Admin\SeriesController@destroy')->name('admin.series.destroy');
    
    
    //Videos
    Route::get('videos','Admin\VideoController@videos')->name('admin.videos');
    Route::get('create/video','Admin\VideoController@add_video')->name('admin.video.create');
    Route::post('store/video','Admin\VideoController@store')->name('admin.videos.store');
    Route::get('edit/video/{id}','Admin\VideoController@edit')->name('admin.video.edit');
    Route::patch('update/video/{id}','Admin\VideoController@update')->name('admin.video.update');
    Route::delete('delete/video/{id}','Admin\VideoController@destroy')->name('admin.video.destroy');
    
    
    //Users
    Route::get('users','Admin\UserController@users')->name('admin.users');
    Route::get('create/user','Admin\UserController@add_user')->name('admin.user.create');
    Route::post('store/user','Admin\UserController@store')->name('admin.user.store');
    Route::get('edit/user/{id}','Admin\UserController@edit')->name('admin.user.edit');
    Route::patch('update/user/{id}','Admin\UserController@update')->name('admin.user.update');
    Route::delete('delete/user/{id}','Admin\UserController@destroy')->name('admin.user.destroy');
    
    //Ratings
    Route::get('ratings','Admin\RatingController@ratings')->name('admin.ratings');

    //Plans
    Route::get('plan/create','Admin\PlanController@create')->name('admin.plan.create');
    Route::get('plans','Admin\PlanController@plans')->name('admin.plans');
    Route::post('plan/store','Admin\PlanController@store')->name('admin.plan.store');
    Route::get('plan/edit/{id}','Admin\PlanController@edit')->name('admin.plan.edit');
    Route::patch('plan/update/{id}','Admin\PlanController@update')->name('admin.plan.update');
    Route::delete('plan/destroy/{id}','Admin\PlanController@destroy')->name('admin.plan.destroy');



    //Subscription
    Route::get('subscriptions','Admin\SubscriptionController@subscriptions')->name('admin.subscriptions');
    Route::delete('subscription/destroy/{id}','Admin\SubscriptionController@destroy')
            ->name('admin.subscription.destroy');

    //Comment        
    Route::get('comments','Admin\CommentController@comments')->name('admin.comments');        
    Route::get('comment/destroy','Admin\CommentController@destroy')->name('admin.comment.destroy');        

    //Settings
    Route::get('settings','Admin\SettingsController@settings')->name('admin.settings');
    Route::patch('settings/update','Admin\SettingsController@update')->name('admin.settings.update');

    //Mail        
    Route::get('mails','Admin\MailController@mails')->name('admin.mails');        
    Route::delete('mail/destroy/{id}','Admin\MailController@destroy')->name('admin.mail.destroy');   

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

//Search Controller | Search User
Route::get('/search', 'SearchController@search')->name('search');


Route::get('courses/{slug}','PlatformController@authors_series')->name('authors_series');



Route::group(['middleware' => 'auth'], function () {
    
    //video
    Route::get('/series/{slug}/episode/{episode_number}','PlatformController@single_video')->name('single_video');
    
    //payments
    Route::get('/payments', 'PaymentController@index')->name('payments');
    Route::post('/payments', 'PaymentController@store')->name('payments.store');

    Route::post('/comment/store/{id}','CommentController@store')->name('comment.store');
    Route::get('/comments/{video}','CommentController@show')->name('comments');
    Route::delete('/comment/delete/{id}','CommentController@destroy')->name('comment.destroy');

});

