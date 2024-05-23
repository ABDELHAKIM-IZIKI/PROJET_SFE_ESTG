<?php

namespace App\Http\Controllers;

use App\Models\Caracteristique;
use Illuminate\Http\Request;

class CaracteristiqueController extends Controller
{

public function delete($id){
    dd($id);
    $caracteristique=Caracteristique::findOrFail($id);
    $caracteristique->delete();

   return  redirect()->route('gestionnairestock.filledit');
}

}
