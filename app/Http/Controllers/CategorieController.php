<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    
    public function index(){
        return view('gestionnairestock.Categorie.home',['categories'=> Categorie::paginate(15) ]);
    }

    public function search(Request $r)
    {
      
      $q = Categorie::query(); 

      
      if($r->has('nom')){
          $v = $r->input('nom');
          $q->where('nom','like','%'.$v.'%');
      }

      $categories=$q->paginate(15);
      return view('admin.Home', ['categories' =>$categories ]);
  }

  public function destroy()
    {
  }
  public function create()
  {
}
public function fillEdit()
{
}

public function edit()
{
}

}

