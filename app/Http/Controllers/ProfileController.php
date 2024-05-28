<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
       $id= User::find(Auth::user()->id);

        if(Auth::user()->role->nom == 'Administrateur'){
       return view('admin.profile.afiche' , ['profile'=> $id] );
   }

   if(Auth::user()->role->nom == 'Gestionnaire de stock'){
    return view('gestionnairestock.profile.afiche', ['profile'=> $id]);
}

if(Auth::user()->role->nom == 'Maintenancier'){
    return view('Maintenancier.profile.afiche', ['profile'=> $id]);
}
   if(Auth::user()->role->nom == 'Fonctionnaire'){
    return view('Fonctionnaire.profile.afiche', ['profile'=> $id]);
}




    }

    public function filledit()
    {
       $id= User::find(Auth::user()->id);

        if(Auth::user()->role->nom == 'Administrateur'){
       return view('admin.profile.filledit' , ['profile'=> $id] );
   }
   
   if(Auth::user()->role->nom == 'Gestionnaire de stock'){
    return view('gestionnairestock.profile.filledit', ['profile'=> $id]);
}

if(Auth::user()->role->nom == 'Maintenancier'){
    return view('Maintenancier.profile.filledit', ['profile'=> $id]);
}
   if(Auth::user()->role->nom == 'Fonctionnaire'){
    return view('Fonctionnaire.profile.filledit', ['profile'=> $id]);
}




    }

    public function filleditmdp()
    {
      

        if(Auth::user()->role->nom == 'Administrateur'){
       return view('admin.profile.editmdp'  );
   }
   
   if(Auth::user()->role->nom == 'Gestionnaire de stock'){
    return view('gestionnairestock.profile.editmdp');
}

if(Auth::user()->role->nom == 'Maintenancier'){
    return view('Maintenancier.profile.editmdp');
}
   if(Auth::user()->role->nom == 'Fonctionnaire'){
    return view('Fonctionnaire.profile.editmdp');
}




    }

    public function edit(Request $r)
    {
        $r->validate([
        'nom'=>'required|min:3|max:40',
        'prenom'=>'required|min:3|max:40',
        'tel'=>'required|min:10',
        'email'=>'required|max:50|email',

            ]);
        $id= User::find(Auth::user()->id);

        $id->update([
          'nom' =>$r['nom'],
          'prenom' =>$r['prenom'],
          'tel' =>$r['tel'],
          'email'=>$r['email'],
        ]);

        return redirect()->back()->with('success','modifié avec succès');
    }

    public function editmdp(Request $r)
    {
        $r->validate([
            'Vpassword'=>'required|min:8|max:30',
        'password'=>'required|min:8|max:30',
        'Cpassword'=>'required|min:8|max:30'
    
                ]);
            $id= User::find(Auth::user()->id);

   if(Hash::check($r['Vpassword'] , Auth::user()->password)){
        
    if($r['password'] == $r['Cpassword']){
        $id->update([
                'password' =>Hash::make($r['password']),
              ]);
              return redirect()->back()->with('success','Mot de passe  modifié avec succès');
        }else{

            return redirect()->back()->with('error',"le mot de passe  c'est pas le méme de mot passe confirmation");
        }






            }else{
                return redirect()->back()->with('error','Votre mot de passe incorrect');
            }

    }
}
