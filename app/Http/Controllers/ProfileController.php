<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($id)
    {
    	if (isset( $_GET['tab'] ))
    		$tab = $_GET['tab'];
    	else
    		$tab = 'home';
    	return view('profile', compact('id', 'tab'));
    }
}
