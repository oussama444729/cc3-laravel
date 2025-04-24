<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function show(){

         return view('login.show');

    }

    public function login(Request $resquest){
        $login= $resquest->login;
        $password = $resquest->password;
        $credentials = ['login' => $login , 'password'=> $password];
         if(Auth::attempt($credentials)){
               $resquest->session()->regenerate();
               return to_route('welcome')->with('success','you are right connect' .$login. ".");
         }else{
             return back()->withErrors([
                'login'=> 'Login or password false.'               
             ])->withInput();
         }
    }
}
