<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function show(){

         return view('login.show');

    }

    public function login(Request $request){
        $login= $request->login;
        $password = $request->password;
        $credentials = ['login' => $login , 'password'=> $password];
         if(Auth::attempt($credentials)){
               $request->session()->regenerate();
               return to_route('dashboard')->with('success', 'You are right connect ' . $login . ".");
         }else{
             return back()->withErrors([
                'login'=> 'Login or password false.'               
             ])->withInput();
         }
    }

   
}
