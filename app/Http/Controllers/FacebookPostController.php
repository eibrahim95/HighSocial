<?php

namespace App\Http\Controllers;

use App\FacebookPost;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Facebook\Facebook;
use App\FacebookUser;
class FacebookPostController extends Controller
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tweet');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        $user = Auth::user();
        $fb = new Facebook([
                'app_id' => config('facebook.config')['app_id'],
                'app_secret' => config('facebook.config')['app_secret'],
                'default_graph_version' => config('facebook.config')['default_graph_version'],
        ]);
        $linkData = [
                'message' => $request['body'],
        ];
        $access_token = FacebookUser::where('id', $user->facebook_id)->first()['access_token'];
            try {
                // Returns a `Facebook\FacebookResponse` object
                $response = $fb->post('/me/feed', $linkData, $access_token);
            } catch(Facebook\Exceptions\FacebookResponseException $e) {
                echo 'Graph returned an error: ' . $e->getMessage();
                exit;
            } catch(Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
            }
            $graphNode = $response->getGraphNode();
            $facebook_post = FacebookPost::create(['user_id' => $user->id, 'post_id' => $graphNode['id']]);
            $response = $fb->get('/'.$graphNode['id'], $access_token);
            $graphNode = $response->getGraphNode();
            echo $graphNode['message'];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FacebookPost  $facebookPost
     * @return \Illuminate\Http\Response
     */
    public function show(FacebookPost $facebookPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FacebookPost  $facebookPost
     * @return \Illuminate\Http\Response
     */
    public function edit(FacebookPost $facebookPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FacebookPost  $facebookPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FacebookPost $facebookPost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FacebookPost  $facebookPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(FacebookPost $facebookPost)
    {
        //
    }
}
