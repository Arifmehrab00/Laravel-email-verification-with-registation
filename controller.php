<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class dashboardController extends Controller
{
    public function index(){
    	return view('layouts.confirmation');
    }
    public function emailVerify($token){
        $user = User::where('email_verification_token', $token)->first();
        if($user) {
           if($user->email_verified == 0 ) {
           	 $user->email_verified = 1;
           	 $user->save();
           	 return redirect()->route('home');
           } elseif($user->email_verified == 1) {
           	 echo 'Your Email Address already verifide';
           } else{
           	return view('layouts.404');
           }
        } else{
        	return view('layouts.404');
        }
    }
}
