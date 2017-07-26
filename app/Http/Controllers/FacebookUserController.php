<?php

namespace App\Http\Controllers;

use Request;
use App\FacebookUser;
use Facebook\Facebook;
use Auth;
class FacebookUserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function disconnect()
    {
        $user = Auth::user();
        if ($user->facebook_id == NULL)
        {
            return redirect('home');
        }
        $user->facebook_id = NULL;
        $user->save();
        
        return redirect('home');
    }
    public function store(Facebook $fb) //method injection
    {
        // retrieve form input parameters
        $uid = Request::input('uid');
        $access_token = Request::input('access_token');
        $permissions = Request::input('permissions');

        // assuming we have a User model already set up for our database
        // and assuming facebook_id field to exist in users table in database
        $fuser = FacebookUser::firstOrCreate(['facebook_id' => $uid]); 

        // get long term access token for future use
        $oAuth2Client = $fb->getOAuth2Client();

        // assuming access_token field to exist in users table in database
        $fuser->access_token = $oAuth2Client->getLongLivedAccessToken($access_token)->getValue();
        $fuser->save();

        $user = Auth::user();
        $user->facebook_id = $fuser->id;
        $user->save();
        // set default access token for all future requests to Facebook API            
        $fb->setDefaultAccessToken($fuser->access_token);

        // call api to retrieve person's public_profile details
        $fields = "id,cover,name,first_name,last_name,age_range,link,gender,locale,picture,timezone,updated_time,verified";
        $fb_user = $fb->get('/me?fields='.$fields)->getGraphUser();
         return back();
    }  
}
