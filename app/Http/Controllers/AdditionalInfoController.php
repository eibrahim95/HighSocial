<?php

namespace App\Http\Controllers;
use App\AdditionalInfo;
use Illuminate\Http\Request;
use Auth;
class AdditionalInfoController extends Controller
{
    public function _construct()
    {
    	$this->middleware('auth');
    }
    public function store(Request $request)
    {
        $info = $request->all();
        unset($info['_token']);
    	$user_id = Auth::user()->id;
    	$additional_info = AdditionalInfo::where('user_id', $user_id)->first();
    	foreach (array_keys($info) as $key)
    	{
    		$additional_info->$key = $info[$key];
    	}
    	$additional_info->save();
        return back();
    }
}
