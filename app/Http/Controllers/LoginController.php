<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  //

  public function login(){
  	return view('auth.login');
  }

  public function auth(Request $request){
  	$this->validate($request, [
  		'email' =>'required|email',
  		'password' => 'required|max:8',
  	]);

    if (Auth::attempt($request->only(['email' , 'password'])))
    {
    	return redirect()->intended('/cart');
    }else{
    	return redirect()->route('login')->withErrors('An error has occurred, check your credentials');
    }

  }

  public function logout()
  {
  	Auth::logout();

  	return redirect()->route('login');
  }
}
