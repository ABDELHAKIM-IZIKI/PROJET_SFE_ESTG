<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
  public function login(){

    return view('Auth.login');
  }

  public function Modifie_MDP(){

    return view('Auth.reset');
  }


  public function MDP_Confirmation()
  {
    return view('Auth.ConfirmationReset');
  }

  
  public function role(){

    return  null ;
  }
}
