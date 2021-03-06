<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TwitterUser;
use Twitter;
use Auth;
use Session;
use Redirect;
use Input;
class TwitterUserController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
	public function connect()
	{
		$user  = Auth::user();
		if ($user->twitter_id != NULL)
			return redirect('/'.$user->id);
	// your SIGN IN WITH TWITTER  button should point to this route
		$sign_in_twitter = true;
		$force_login = false;

	// Make sure we make this request w/o tokens, overwrite the default values in case of login.
		Twitter::reconfig(['token' => '', 'secret' => '']);
		$token = Twitter::getRequestToken(route('twitter.callback'));

		if (isset($token['oauth_token_secret']))
		{
			$url = Twitter::getAuthorizeURL($token, $sign_in_twitter, $force_login);

			Session::put('oauth_state', 'start');
			Session::put('oauth_request_token', $token['oauth_token']);
			Session::put('oauth_request_token_secret', $token['oauth_token_secret']);

			return Redirect::to($url);
		}

		return Redirect::route('twitter.error');
		}
	public function disconnect()
    {
        $user = Auth::user();
        if ($user->twitter_id == NULL)
        {
            return redirect('home');
        }
        $user->twitter_id = NULL;
        $user->save();
        
        return redirect('home');
    }
	public function store()
	{
	$user  = Auth::user();
	if ($user->twitter_id != NULL)
		return redirect('/'.$user->id);
	// You should set this route on your Twitter Application settings as the callback
	// https://apps.twitter.com/app/YOUR-APP-ID/settings
	if (Session::has('oauth_request_token'))
	{
		$request_token = [
			'token'  => Session::get('oauth_request_token'),
			'secret' => Session::get('oauth_request_token_secret'),
		];

		Twitter::reconfig($request_token);

		$oauth_verifier = false;

		if (Input::has('oauth_verifier'))
		{
			$oauth_verifier = Input::get('oauth_verifier');
			// getAccessToken() will reset the token for you
			$token = Twitter::getAccessToken($oauth_verifier);
		}

		if (!isset($token['oauth_token_secret']))
		{
			return Redirect::route('twitter.error')->with('flash_error', 'We could not log you in on Twitter.');
		}

		$credentials = Twitter::getCredentials();

		if (is_object($credentials) && !isset($credentials->error))
		{
			// $credentials contains the Twitter user object with all the info about the user.
			// Add here your own user logic, store profiles, create new users on your tables...you name it!
			// Typically you'll want to store at least, user id, name and access tokens
			// if you want to be able to call the API on behalf of your users.

			// This is also the moment to log in your users if you're using Laravel's Auth class
			$twitter_user = TwitterUser::firstOrCreate(['twitter_id' => $credentials->id_str]);

			$twitter_user->access_token = $token['oauth_token'];
			$twitter_user->access_token_secret = $token['oauth_token_secret'];
			$twitter_user->save();

			$user = Auth::User();
			$user->twitter_id = $twitter_user->id;
			$user->save();

			Session::put('access_token', $token);
			//return  Twitter::postTweet(['status' => 'test test test'. 'format' => 'json']);
			return Redirect::to('/');
		}

		return Redirect::route('twitter.error')->with('flash_error', 'Crab! Something went wrong while signing you up!');
	}
	}
}
