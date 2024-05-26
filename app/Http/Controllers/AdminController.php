<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserRequestUpdate;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    { 
      $roles =Role::all();
      $users = User::paginate(10);
  
      return view('admin.Home', ['users'=>$users , 'roles'=>$roles ,'adminpassword' => null    ] );
    }


    
    public function search(Request $r)

    {
      
      $q = User::query(); 

      
      if($r->has('valeur') && ($r->input('valeur') != null )){
          $v = $r->input('valeur');
          $q->where('nom','like','%'.$v.'%')->orwhere('prenom','like','%'.$v.'%')->orwhere('division','like','%'.$v.'%')
          ->orwhere('service','like','%'.$v.'%');
      }

      if($r->has('choix') && ($r->input('choix') != null )){
        $v = $r->input('choix');
        $q->where('roles_id','=',$v);}

      $roles =Role::all();
      return view('admin.Home', ['users' =>$q->paginate(10) ,'roles'=>$roles  ]);
  }
  
  public function fill(){
    $roles=Role::all();
    return view('admin.ajouter',['roles'=>$roles ,'user'=> null,'CpasswordMessage' =>null ,'adminpassword' => null]);
  }

  public function create(UserRequest $r){
 
    $useradmin=User::find($id=1);

    if(Hash::check($r['adminpassword'] ,$useradmin->password)){
    if($r['password']==$r['Cpassword'] ){
    
    User::insert([
      'roles_id'=>$r['roles_id'],
      'nom'=>$r['nom'] ,
       'prenom'=>$r['prenom'],
       'tel'=>$r['tel'],
       'email'=>$r['email'],
       'password'=>Hash::make($r['password']),
       'division'=>$r['division'],
       'service'=>$r['service']
      ]); 

      return redirect()->route('admin.index')
      ->with('success','ajouté avec succès');
      }else{
        $roles=Role::all();
        return view('admin.ajouter',['roles'=>$roles ,'user'=> $r ,'CpasswordMessage' => "le mot de passe  c'est pas le méme"]);
      }

    }else{
        $roles=Role::all();
        return view('admin.ajouter',['roles'=>$roles ,'user'=> $r ,'adminpassword' => "Mot de passe incorrect" , 'CpasswordMessage'=>null]);
    }
  }
  
  public function destroy(Request $r)
  {
    
    $useradmin=User::find($id=1);

    if(Hash::check($r['adminpassword'] ,$useradmin->password)){

    $destroyUser=User::find($r['id']);
    $destroyUser->delete();
    return redirect()->back()->with('success','supprimé avec succès');

    }else{
      
      return redirect()->back()->with('success','Mot de passe incorrect ,  échec à supprimer');
    }
  }
  
  public function fillEdit(Request $r)
  {
    $user=User::find($r['id']);
    $roles=Role::all();
    return view('admin.Modifie',['roles'=>$roles ,'user'=>  $user , 'CpasswordMessage' =>null , 'hidden' =>'hidden' ,'adminpassword' =>null]);
  }
  public function edit(UserRequestUpdate $r)
  {
 
    
    $user=User::find($r['id']);

 
  if(empty($r['password']) && empty($r['Cpassword']) && empty($r['adminpassword'])){
 
  $user->roles_id = $r['roles_id'] ;
  $user->save();
 
   $user->update([
  'nom'=>$r['nom'] ,
   'prenom'=>$r['prenom'],
   'tel'=>$r['tel'],
   'email'=>$r['email'],
   'division'=>$r['division'],
   'service'=>$r['service']
  ]);



  return redirect()->route('admin.index')
      ->with('success','modifié avec succès');
}

$useradmin=User::find($id=1);
if(Hash::check($r['adminpassword'] ,$useradmin->password)){

if($r['password']==$r['Cpassword']){

  $user->roles_id = $r['roles_id'] ;
  $user->save();
  
      $user->update([ 
      'nom'=>$r['nom'] ,
       'prenom'=>$r['prenom'],
       'tel'=>$r['tel'],
       'email'=>$r['email'],
       'password'=>Hash::make($r['password']),
       'division'=>$r['division'],
       'service'=>$r['service']
]); 

return redirect()->route('admin.index')
      ->with('success','modifié avec succès');
}else{
 
        $roles=Role::all();
        return view('admin.Modifie',['roles'=>$roles ,'user'=>  $user , 'CpasswordMessage' =>"le mot de passe  c'est pas le méme de mot passe confirmation" , 'hidden' =>null ,'adminpassword'=>null]);}

  

      }else{
  $roles=Role::all();
  return view('admin.Modifie',['roles'=>$roles ,'user'=> $r ,'adminpassword' => "Mot de passe incorrect" , 'CpasswordMessage'=>null , 'hidden' =>null]);
}
}
}
