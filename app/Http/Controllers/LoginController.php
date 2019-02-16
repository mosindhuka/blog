<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use Session;

class LoginController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
    public function index()
    {
		
        return view('login');

    }
	
	public function login(Request $request)
	{
		 $validator = Validator::make($request->all(), [
           'username' => 'required',
           'password' => 'required'
       ]);

		  if ($validator->fails()) {
            return redirect('/')
                        ->withErrors($validator)
                        ->withInput();
        }
		// The blog post is valid...
		 $user = User::where('username', $request->username)->where('password',$request->username)->get()->first();
		if(!empty($user->id))
		{
			$request->session()->put('user_id', $user->id);
			$request->session()->put('role', $user->role);
			return redirect('post');
			
		}
		else{
			Session::flash('message', "Invalid Credentials");
			return redirect('/');
		}
	}
	
	public function logout(Request $request)
    {
		$request->session()->flush();
        return redirect('/');

    }

}
