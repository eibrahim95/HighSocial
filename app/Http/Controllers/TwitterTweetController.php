<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\TwitterUser;
use Twitter;
use Session;
use Auth;
class TwitterTweetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
        protected function validator(array $data)
    {
        return Validator::make($data, [
            'body' => 'required|string|max:200',
        ]);
    }
    public function store(Request $request)
    {
    	$this->validator($request->all())->validate();
        $user = Auth::user();

        $twitter_user = TwitterUser::where('id', $user->twitter_id)->first();
        $token = $twitter_user['access_token'];
        $token_secret = $twitter_user->access_token_secret;
        Twitter::reconfig(['token' => $token, 'secret' => $token_secret]);
        Twitter::postTweet(['status' => $request['body']]);

        return redirect('home');
    }
}
