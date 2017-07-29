<?php
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

Route::get('ajaxImageUpload', ['uses'=>'AjaxImageUploadController@ajaxImageUpload']);
Route::post('ajaxImageUpload', ['as'=>'ajaxImageUpload','uses'=>'AjaxImageUploadController@ajaxImageUploadPost']);

Route::post('add_info', 'AdditionalInfoController@store');

Route::get('posts.{post_id}', 'FacebookUserController@store');
Route::get('fposts.{post_id}', 'FacebookUserController@store');
Route::get('tweets.{post_id}', 'FacebookUserController@store');
Route::get('instas.{post_id}', 'FacebookUserController@store');
Route::get('{user_name}', 'ProfileController@index');

Route::post('{user_name}', 'FacebookUserController@store');