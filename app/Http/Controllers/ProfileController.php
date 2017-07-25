<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    	return view('profile', compact('id', 'tab'));
    }
}
