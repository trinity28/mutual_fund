<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
	public function __construct()
	{
	$this->middleware('guest')->except(['destroy']);
	}
 	public function create()
    {
    	return view('sessions/create');
    }
    public function store()
    {
    	if(!auth()->attempt(request(['email','password']))){
    		return back()->withErrors([
    			'message=>"please check your credentials']);
    	}
    	return redirect('/');
    }
    public function destroy()
    {
       auth()->logout();

       return redirect('/');
    }
}
