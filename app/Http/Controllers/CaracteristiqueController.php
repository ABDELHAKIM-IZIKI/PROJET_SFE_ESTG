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

}
