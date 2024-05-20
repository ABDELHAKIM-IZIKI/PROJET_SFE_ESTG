<?php

namespace App\Http\Controllers;

use App\Models\Materiel;
use Illuminate\Http\Request;

class FonctionnaireController extends Controller
{
   public function index($id=17)
   { 
      return  view('Fonctionnaire.home',['registres' => Materiel::where('users_id',$id)->get()]);
   }

   public function indexReclamation($id){

   }
}
