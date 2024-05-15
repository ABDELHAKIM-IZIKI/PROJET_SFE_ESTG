<?php

namespace App\Http\Controllers;

use App\Models\Registre;
use Illuminate\Http\Request;

class RegistreController extends Controller
{
    public function index(){
      
        return view('gestionnairestock.Registre.home',['registres'=> Registre::paginate(15) ]);
    }

    public function search(Request $r)
    {
      
      $q = Registre::query(); 
      
      if ($r->has('valeur')) { 
        $valeur = "%".$r->input('valeur')."%";
         $q->whereHas('user',  function ($query) use ($valeur )  {  $query->where('nom', 'like',  $valeur )->orWhere('prenom','like', $valeur ); } ); 
         $q->orwhereHas('materiel',  function ($query) use ($valeur )  {  $query->where('nom', 'like',  $valeur )->orWhere('model','like', $valeur ); } );
         $q->orwhere('lieu','like', $valeur );
    }
      
      $registres=$q->paginate(15);
     
      return view('gestionnairestock.Registre.home', ['registres'=>$registres]);
  }
}
