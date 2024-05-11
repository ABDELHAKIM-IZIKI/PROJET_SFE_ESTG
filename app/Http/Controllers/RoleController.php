<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Http\Requests\RoleRequestUpdate;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    { 

      $roles = Role::paginate(10);
      return view('role.Home', ['roles'=>$roles] );
    }

    public function search(Request $r)
    {
      
      $q = Role::query(); 
      if($r->has('nom')){
          $v = $r->input('nom');
          $q->where('nom','like','%'.$v.'%');
      }
      
      $roles=$q->paginate(10);
      return view('role.Home', ['roles' =>$roles]);
  }

  public function fill(){
    return view('role.ajouter');
  }

  
  public function create(RoleRequest $a){
    $r=$a->validated();
    
    Role::insert([ 'nom'=>$r['nom']  ]); 
  return redirect()->route('role.index')
      ->with('success','ajouté avec succès');
  }
  
  
  public function destroy(Request $r){
    $destroyRole=Role::find($r['id']);
    $destroyRole->delete();
    return redirect()->back()->with('success','supprimé avec succès');
  }

  public function fillEdit(Request $r){
    $role=Role::find($r['id']);
    return view('role.Modifie',['role'=>  $role ]);
  }

  public function edit(RoleRequest $r){
 
  $role=Role::find($r['id']);
  $role->nom = $r['nom'] ;
  $role->save();
  return redirect()->route('role.index')
  ->with('success','modifié avec succès');
  }
 
}
