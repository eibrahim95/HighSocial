<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdditionalInfo;
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

      ]);


      if ($validator->passes()) {


        $input = $request->all();
        $image = $input['image'];
        if (preg_match('/data:image\/(gif|jpeg|png);base64,(.*)/i', $image, $matches)) {
          $imageType = $matches[1];
          $imageData = base64_decode($matches[2]);
          $image = Image::make($imageData);
      
        if ($image->save(public_path().'/images/profile/' . Auth::user()->id.'.jpg')) {
        	$user_additional = AdditionalInfo::where('user_id', Auth::user()->id)->first();
        	$user_additional->profile_pic = '/images/profile/' . Auth::user()->id.'.jpg';
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
