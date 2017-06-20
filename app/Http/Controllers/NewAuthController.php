<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class NewAuthController extends Controller
{
    public function login()
    {
    	
    }

    public function isAuth()
    {	
    	if (\Auth::check()) {
    		return \Response::json(true);
    	} else {
    		return \Response::json(false);
    	}
    }
    public function postLogin(Request $request)
     { 

    	$params = json_decode(file_get_contents('php://input'),true);
    	$this->validate($request, [
    		'email' => 'required',
    		'password' => 'required'
    	]);

        $remember =  ($request->remember ? $request->remember : false) ;

 
    	if (\Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication passed...
            $user = \App\User::with('roles')->find(\Auth::user()->id);

        
            return \Response::json($user);
        } else {
        	return \Response::json(['flash' => 'Invalid username or password'], 500);
        	// redirect()->back()->withInput();
        }
    
    }
    public function logout()
    {
    	\Auth::logout();

    	return \Response::json(['flash' => 'Logged Out']);
    }

    public function create(Request $request)
    {   

        $validator = \Validator::make($request->all(), [
            'name' => 'required|unique:users|max:16',
            'email' => 'required|unique:users',
            'password' => 'required'
        ]);


        if($validator->fails()) {
            return \Response::json([
                'messages' => $validator->errors()
            ]);
        };

        $confirmation_code = str_random(30);

        $user = \App\User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => \Hash::make($request->password),
            'confirmed' => false,
            'confirmation_code' => $confirmation_code,
        ]);

        $user->roles()->attach(1);
        $user->save();
        // send email with conf code
        \Mail::send('mailconfirm', ['confirmation_code' => $confirmation_code], function($message) {
            $message->to(\Request::get('email'))->from('ME@ADMIN')->subject('confirm your email');
        });


        return \Response::json($request);
    }

    public function verify($confirmation_code)
    {
        if (!$confirmation_code) throw new InvalidConfirmationCodeException;
        // $user = \App\User::where('confirmation_code', '=', $confirmation_code)->first();
        // if (!$user) throw new InvalidConfirmationCodeException;
        try {
            $user = \App\User::where('confirmation_code', '=', $confirmation_code)->first();
             if (!$user) throw new InvalidConfirmationCodeException;
        } catch  (InvalidConfirmationCodeException $e) {
            echo $e;
        };


            
        // if (!$confirmation_code) throw new InvalidConfirmationCodeException;
        // $user = \App\User::where('confirmation_code', '=', $confirmation_code)->first();
        // if (!$user) throw new InvalidConfirmationCodeException;
        // $user->confirmed = true;
        // $user->confirmation_code = null;
        // $user->save();
        $verifieduser = \App\User::first();
        
        // return \Redirect::to('./#/login')->with('status','verifieduser');
        return \Response::json(['message' => 'You successfully confirmed email', 'confirmed' => true, 'verifieduser' => $verifieduser]);

    }
}
