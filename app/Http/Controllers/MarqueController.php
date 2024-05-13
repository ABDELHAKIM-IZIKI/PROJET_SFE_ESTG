<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use Illuminate\Http\Request;

class MarqueController extends Controller
{
    public function index(){
        return view('gestionnairestock.Marque.home',['Categorie'=> Marque::paginate(15) ]);
    }
}
