<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class SettingsController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	if (isset( $_GET['tab'] ))
    		$tab = $_GET['tab'];
    	else
    		$tab = 'home';
    	return view('settings', compact('tab'));
    }
}


