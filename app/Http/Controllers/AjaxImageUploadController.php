<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdditionalInfo;
use Carbon\Carbon;
use Validator;
use Image;
use Auth;
class AjaxImageUploadController extends Controller
{
    	/**

     * Show the application ajaxImageUpload.

     *

     * @return \Illuminate\Http\Response

     */
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function ajaxImageUpload()

    {

    	return 'ajaxImageUpload';

    }


    /**

     * Show the application ajaxImageUploadPost.

     *

     * @return \Illuminate\Http\Response

     */

    public function ajaxImageUploadPost(Request $request)

    {
      $validator = Validator::make($request->all(), [
		'title' => 'required',
		'image' => 'required',
		'type' => 'required'
      ]);


      if ($validator->passes()) {
      	$input = $request->all();
      	$type = $input['type'];
      	$image = $input['image'];
      	if ( $type == 0){
      		$local_path = '/images/profile/';
      		$pic = 'profile_pic';
      	}
      	else {
      		$local_path = '/images/cover/';
      		$pic='cover_pic';
      	}

        if (preg_match('/data:image\/(gif|jpeg|png);base64,(.*)/i', $image, $matches)) {
          $imageType = $matches[1];
          $imageData = base64_decode($matches[2]);
          $image = Image::make($imageData);
          $image->save(str_replace(' ', '_', public_path().'/images/' . Auth::user()->id.'_'.Carbon::now().'.'.$imageType));
          $size = min($image->width(), $image->height());
      	  if ($type == 0 )
      	  	$image = $image->fit($size);
      	  else
      	  	$image = $image->fit(700, 280);
        if ($image->save(public_path().$local_path . Auth::user()->id.'.'.$imageType)) {
        	$user_additional = AdditionalInfo::where('user_id', Auth::user()->id)->first();
        	$user_additional[$pic] = $local_path . Auth::user()->id.'.'.$imageType;
        	$user_additional->save();
            return back();
          } else {
              throw new Exception('Could not save the file.');
          }
      }
      	return response()->json(['error'=>$validator->errors()->all()]);

    }
	}
}
