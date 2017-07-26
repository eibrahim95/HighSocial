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
    		$tab = 'gn';
    	$active = Array('gn' => '', 'fb' => '', 'tw' => '', 'in' => '');
    	if (in_array( $tab, ['gn', 'fb', 'tw', 'in']))
    	{
    		$active[$tab] = 'active';
    	}
    	else
    		$active['gn'] = 'active';
    	return view('settings', compact('active'));
    }
}


