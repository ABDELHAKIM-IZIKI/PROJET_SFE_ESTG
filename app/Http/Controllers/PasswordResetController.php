<?php

namespace App\Http\Controllers;

use App\Mail\MyMail;
use App\Models\Password_resets;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PasswordResetController extends Controller
{
    public function pageReset(){
        return view('Auth.reset');
      }
    

    
      public function sendCode(Request $request){
        $request->validate(['email' => 'required|email']);
    
    
        if(User::where('email', 'like',$request->email)->exists()) {

     $code = mt_rand(100000, 999999);
       /*    Password_resets::updateOrInsert([
            'email' => $request->email,
            'token' => $code , 
            'created_at' => now()
            ]);
       */ 
            Mail::to($request->email)->send(new MyMail($code));

return view('Auth.codereset') ;

        }else{
            
            return redirect()->route('Auth.pageReset')->with('success',"Aucun compte utilise cette adresse e-mail");
        }
      }
      public function   MDP_change_page()
      {
       return view('Auth.MDP_change');
      }


      public function MDP_change()
      {
        return redirect()->route('Auth.loginpage');
      }
    
}
