<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
  public function loginpage(){

    return view('Auth.login');
  }

  public function login(){

    return view('Auth.login');
  }
 
  public function logout(Request $request): RedirectResponse
  {
      Auth::logout();
   
      $request->session()->invalidate();
   
      $request->session()->regenerateToken();
   
      return redirect('/');
  }

  public function Modifie_MDP(){

    return view('Auth.reset');
  }


  public function MDP_Confirmation()
  {
    return view('Auth.ConfirmationReset');
  }

  
  public function role(LoginRequest $request): RedirectResponse
  {  Auth::gu
    
        $request->authenticate();

        $request->session()->regenerate();
        
        $url = "";
        if($request->user()->role === "admin"){
            $url = "admin/dashboard";
        }elseif($request->user()->role === "agent"){
            $url = "agent/dashboard";
        }else{
            $url = "dashboard";  
        }

        return redirect()->intended($url);
    }
 



}
