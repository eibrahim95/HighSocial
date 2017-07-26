<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Facebook\Facebook;
use App\FacebookUser;
use App\HighsocialPost;
use Carbon\Carbon;
use Auth;
class ProfileController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($id)
    {
    	if (Auth::user()->id != $id)
    	{
    		return redirect('home');
    	}
    	if (isset( $_GET['tab'] ))
    		$tab = $_GET['tab'];
    	else
    		$tab = 'home';
        $user = Auth::user();
        $user_posts = $user->highsocialPosts->toArray();
        $fb_posts = Array();

        if ($user->facebook_id != NULL)
        {
            $user_fb_posts = $user->facebookPosts->toArray();
            $fb = new Facebook([
                'app_id' => config('facebook.config')['app_id'],
                'app_secret' => config('facebook.config')['app_secret'],
                'default_graph_version' => config('facebook.config')['default_graph_version'],
            ]);
            $access_token = FacebookUser::where('id', Auth::user()->facebook_id)->first()['access_token'];
            foreach ($user_fb_posts as $user_fb_post){
                $response = $fb->get('/'.$user_fb_post['post_id'], $access_token);
                $graphNode = $response->getGraphObject();
                $fb_post = new HighsocialPost;
                $fb_post->user_id = Auth::user()->id;
                $fb_post->body = $graphNode['message'];
                $fb_post->published_at = Carbon::parse($graphNode['created_time']->format('Y-m-d H:i:s'));
                array_push($fb_posts, $fb_post);
            }
        }
    	return view('profile', compact('id', 'tab', 'user_posts', 'fb_posts'));
    }
}
