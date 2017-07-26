<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\HighsocialPost;
use Carbon\Carbon;

class HighSocialPostController extends Controller
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
    public function index()
    {
    	return view('tweet');
    }
    public function store(Request $request)
    {
    		$this->validator($request->all())->validate();
    		$post = new HighsocialPost;
    		$post->body = $request['body'];
    		$post->published_at = Carbon::now();
            $user = Auth::user();
    		$post->user_id = $user->id;
    		$post->save();
            

            
    		return redirect('home');
    }
}
