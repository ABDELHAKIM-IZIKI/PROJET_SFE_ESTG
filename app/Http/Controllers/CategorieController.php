<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategorieRequest;
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
      return view('gestionnairestock.Categorie.home', ['categories' =>$categories ]);
  }

  public function destroy(Request $r)
    { 
        $destroyCategorie=Categorie::find($r['id']);
        $destroyCategorie->delete();
        return redirect()->back()->with('success','supprimé avec succès');
  }
  public function create(CategorieRequest $a)
  {
    $r=$a->validated();
    
    Categorie::insert([ 'nom'=>$r['nom'] ]); 
     
    return redirect()->back()->with('success','ajouté avec succès');
      
}

public function edit(CategorieRequest $a)
  {     
    $r=$a->validated();
    $categorie=Categorie::find($r['id']);
    $categorie->update(['nom'=>$r['nom'] ]); 

   return redirect()->back()->with('success','modifié avec succès');


}



}

