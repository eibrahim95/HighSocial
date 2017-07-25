<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InstagramUser;
use Instagram;
use Auth;
class InstagramUserController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function connect()
    {
    	$user  = Auth::user();
		if ($user->instagram_id != NULL)
			return redirect('/'.$user->id);

		return redirect(Instagram::getLoginUrl());

    }
    public function store(Request $request)
    {

		//$response = $instagram->getAccessToken($request->code);
		$response = Instagram::getAccessToken($request->code);

   		 if (isset($response['code']) == 400)
   		 {
      		  throw new \Exception($response['error_message'], 400);
  		 }
    	$iid = $response['user']['id'];
    	$iuser = InstagramUser::firstOrCreate(['instagram_id' => $iid]); 

    	$iuser->access_token = $response['access_token'];
    	$iuser->save;
		
		$user = Auth::user();
        $user->instagram_id = $iuser->id;
        $user->save();
        return redirect('/'.$user->id);
    }
}
