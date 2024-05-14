<?php

namespace App\Http\Controllers;


use App\Http\Requests\MarqueRequest;
use App\Models\Marque;
use Illuminate\Http\Request;

class MarqueController extends Controller
{
    public function index(){
        return view('gestionnairestock.Marque.home',['Marques'=> Marque::paginate(15) ]);
    }

    public function search(Request $r)
    {
      
      $q = Marque::query(); 

      
      if($r->has('nom')){
          $v = $r->input('nom');
          $q->where('nom','like','%'.$v.'%');
      }

      $Marques=$q->paginate(15);
      return view('gestionnairestock.Marque.home', ['Marques' =>$Marques ]);
  }

  public function destroy(Request $r)
    { 
        $destroyMarque=Marque::find($r['id']);
        $destroyMarque->delete();
        return redirect()->back()->with('success','supprimé avec succès');
  }
  public function create(Request $r)
  {
  
    
    Marque::insert([ 'nom'=>$r['nom'] ]); 
     
    return redirect()->back()->with('success','ajouté avec succès');
      
}

public function edit(MarqueRequest $a)
  {     
    $r=$a->validated();
    $Marque=Marque::find($r['id']);
    $Marque->update(['nom'=>$r['nom'] ]); 

   return redirect()->back()->with('success','modifié avec succès');


}



}


    

