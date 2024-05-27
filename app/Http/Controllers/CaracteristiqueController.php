<?php

namespace App\Http\Controllers;

use App\Models\Caracteristique;
use Illuminate\Http\Request;

class CaracteristiqueController extends Controller
{

public function delete($id){
 
    $caracteristique=Caracteristique::findOrFail($id);
    $caracteristique->delete();

   return  redirect()->back()->with('success','le caracteristique a été supprimé avec succès');;
}


 public function add(Request $r)
 {

  Caracteristique::insert([
    'materiels_id' => $r['materiels_id'] ,
    'nom'=> $r['nom'] ,
    'valeur' =>$r['valeur']

  ]);

  return redirect()->back()->with('success','caractère bien  été ajouté');
}

  public function edit(Request $r)
  {
 
    $caracteristique=Caracteristique::find($r['id']);
   $caracteristique->update([
     'nom'=> $r['nom'] ,
     'valeur' =>$r['valeur']
 
   ]);

   return redirect()->back()->with('success','caractère bien  été modifié');
      
 }


} 
