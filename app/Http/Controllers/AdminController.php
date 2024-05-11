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
      return view('admin.Home', ['users'=>$users , 'roles'=>$roles] );
    }


    
    public function search(Request $r)
    {
      
      $q = User::query(); 

      
      if($r->has('nom')){
          $v = $r->input('nom');
          $q->where('nom','like','%'.$v.'%');
      }
  
      if($r->has('prenom')){
          $v = $r->input('prenom');
          $q->where('prenom','like','%'.$v.'%');
      }
  
      if($r->has('division')){
          $v = $r->input('division');
          $q->where('division','like','%'.$v.'%');
      }
  
      if($r->has('service')){
          $v = $r->input('service');
          $q->where('service','like','%'.$v.'%');
      }
      
      if($r->has('choix') && ($r->input('choix') != 'Choisir un role')){
        $v = $r->input('choix');
        $q->where('roles_id','=',$v);}

      $roles =Role::all();
      $users=$q->paginate(10);
      return view('admin.Home', ['users' =>$users,'roles'=>$roles]);
  }
  
  public function fill(){
    $roles=Role::all();
    return view('admin.ajouter',['roles'=>$roles ,'user'=> null,'CpasswordMessage' =>null]);
  }

  public function create(UserRequest $a){
    $r=$a->validated();
    if($r['password']==$r['Cpassword']){
    
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
  }
  
  public function destroy(Request $r)
  {
    $destroyUser=User::find($r['id']);
    $destroyUser->delete();
    return redirect()->back()->with('success','supprimé avec succès');
  }
  
  public function fillEdit(Request $r)
  {
    $user=User::find($r['id']);
    $roles=Role::all();
    return view('admin.Modifie',['roles'=>$roles ,'user'=>  $user , 'CpasswordMessage' =>null , 'hidden' =>'hidden']);
  }
  public function edit(UserRequestUpdate $r)
  {
 
    
    
    $user=User::find($r['id']);

 if(empty($r['password']) && empty($r['Cpassword'])){
 
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
        return view('admin.Modifie',['roles'=>$roles ,'user'=>  $user , 'CpasswordMessage' =>"le mot de passe  c'est pas le méme" , 'hidden' =>null]);}

  }
}
