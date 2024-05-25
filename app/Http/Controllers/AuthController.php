<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Middleware\Role;

class AuthController extends Controller
{


  public function loginpage(Request $request)
  {
    
    if (Auth::check()) {
      return $this->redirectToRolePage($request);
  }else{
    return view('Auth.login');}
  }


  public function login(Request $request){

    $validator =  $request->validate([  'email' => 'required|max:50|email', 'password' => 'required|min:8|max:30']);
   
    if (Auth::attempt($request->only('email', 'password'))) {
      return $this->redirectToRolePage($request);
  } else {
      return redirect()->route('Auth.loginpage')->with('success', 'Email ou mot de passe incorrect');
  }
}
 
  protected function redirectToRolePage($user)
  {
    if($user->user()->role->nom == 'Administrateur' ){
      return redirect()->route('admin.index');
    }

    if($user->user()->role->nom == 'Gestionnaire de stock' ){
      return redirect()->route('GestionnairesStock.index');
    }

    if($user->user()->role->nom == 'Maintenancier' ){
       return redirect()->route('Maintenancier.index');
     }

    if($user->user()->role->nom == 'Fonctionnaire' ){
      return redirect()->route('Fonctionnaire.index');
    }

    if($user->user()->role->nom == 'Avec no role' ){
      Auth::logout();
      return redirect()->route('Auth.loginpage')->with('success',"tu n'a pas autorisé pour connecter a votre compte");
    }

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

  
 
 public function Banned(){

  return view('Auth.Banned');
 }



}
