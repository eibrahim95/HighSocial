<?php

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

Route::get('/', function () {
	if (Auth::check())
	{
		return redirect('home');
	}
	else
	{
		return view('welcome');
	}
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/facebook/disconnect', 'FacebookUserController@disconnect');
Route::post('/fbpost', 'FacebookPostController@store');


Route::get('twitter/connect', 'TwitterUserController@connect');
Route::get('twitter/disconnect', 'TwitterUserController@disconnect');
Route::get('twitter/callback', ['as'=>'twitter.callback', 'uses' => 'TwitterUserController@store']);
Route::get('twitter/error', ['as' => 'twitter.error', function(){
	dd('some error');
}]);

Route::get('twitter/logout', ['as' => 'twitter.logout', function(){
	Session::forget('access_token');
	return Redirect::to('/')->with('flash_notice', 'You\'ve successfully logged out!');
}]);


Route::get('instagram/connect', 'InstagramUserController@connect');
Route::get('instagram/callback', 'InstagramUserController@store');

Route::post('/tweet', 'TwitterTweetController@store');
Route::post('/post', 'HighSocialPostController@store');

Route::get('settings', 'SettingsController@index');
Route::post('settings', 'FacebookUserController@store');
Route::get('{id}', 'ProfileController@index');
Route::post('{id}', 'FacebookUserController@store');