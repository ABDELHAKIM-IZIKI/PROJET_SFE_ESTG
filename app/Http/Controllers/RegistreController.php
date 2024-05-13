<?php

namespace App\Http\Controllers;

use App\Models\Registre;
use Illuminate\Http\Request;

class RegistreController extends Controller
{
    public function index(){
        return view('gestionnairestock.Registre.home',['Categorie'=> Registre::paginate(15) ]);
    }
}
