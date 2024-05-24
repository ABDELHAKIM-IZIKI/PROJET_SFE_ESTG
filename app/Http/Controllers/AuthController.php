<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
  public function loginpage(Request $request){

    

    return view('Auth.login');
  }

  public function login(){

    return null ;
  }
 
  public function logout(Request $request)
  {
      Auth::logout();
   
      $request->session()->invalidate();
   
      $request->session()->regenerateToken();
   
      return redirect()->route('home');
  }

  public function Modifie_MDP(){

    return view('Auth.reset');
  }


  public function MDP_Confirmation()
  {
    return view('Auth.ConfirmationReset');
  }

  
 
 



}
