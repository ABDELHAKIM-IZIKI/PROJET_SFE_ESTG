<?php

namespace App\Http\Controllers;

use App\Mail\MyMail;
use App\Models\Password_resets;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PasswordResetController extends Controller
{
    
    public function pageReset(){
        return view('Auth.reset');
    }
    
   
    public function sendCode(Request $request)
    {
       $request->validate(['email' => 'required|email']);
    
        if(User::where('email', $request->email)->exists()) {
            $code = mt_rand(100000, 999999);

            
            Password_resets::updateOrInsert(
                ['email' => $request->email,
                'token' => $code, 
                'created_at' => now()
                ]);

            
            Mail::to($request->email)->send(new MyMail($code));
         
            return view('Auth.codereset')->with('email' , $request->email);
        } else {
            return redirect()->back()->with('error', "Aucun compte n'utilise cette adresse e-mail");
        }
    }

    
    public function MDP_change_page(Request $request ){
        $request->validate(['email' => 'required|email', 'code' => 'required|numeric|max:6|min:3']);

        $reset = Password_resets::where('email', $request->email)
                                ->where('token', $request->code)
                                ->first();

        if($reset && $reset->created_at->diffInMinutes(now()) <= 10 ) {
            return view('Auth.MDP_change');
        } else {
            return redirect()->route('Auth.pageReset')->with('error', "Code de réinitialisation expiré ");
        }
    }

    
    public function MDP_change(Request $request){

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:40',
            'Cpassword' => 'required|min:8|max:40'
        ]);

        if($request->password == $request->Cpassword){
        $user = User::where('email', $request->email)->first();

        $user->update([ 
              'password' => Hash::make($request->password)
             ]);
      
      Password_resets::where('email', $request->email)->delete();

            return redirect()->route('Auth.loginpage')->with('success', "Mot de passe réinitialisé avec succès.");
        
          } else {

            return redirect()->route('Auth.pageReset')->with('error', "le mot de passe  c'est pas le méme de mot passe confirmation");
        }
    }
}
