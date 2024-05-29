<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReclamationRequest;
use App\Models\Materiel;
use App\Models\Reclamation;
use App\Models\Registre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FonctionnaireController extends Controller
{
   public function index()
   {   $id=Auth::user()->id;
      $registres=Registre::where('users_id',$id)->orderBy('id')->paginate(10);
      if ($registres->isEmpty()) {
      return  view('Fonctionnaire.home',['registres' =>$registres , 'vide' => 'Aucune affectation matériel ou équipement']);
   }else{
      return  view('Fonctionnaire.home',['registres' =>$registres , 'vide' => null]);
   }
   }

public function Reclamé(ReclamationRequest $a){
    $r=$a->validated();

    Reclamation::insert($r);

    return redirect()->route('Fonctionnaire.index')->with('success','Reclamé avec succès');


}

public function search(Request $r)
{ 
    $id=Auth::user()->id;
    $q = Registre::where('users_id' , $id); 
 
    if($r->has('valeur') && ($r->input('valeur') != null)){
        $v = $r->input('valeur');
        $q->whereHas('materiel',  function ($query) use ( $v  )  
        {  $query->where('model', 'like','%'.$v.'%' )
                ->orWhere('marques_id','like', '%'.$v.'%' )
                ->orwhere('nom','like','%'.$v.'%')
                ->orWhere('barcode','like','%'.$v.'%')
                ->orwhereHas('marque',  function ($query) use ( $v  )
                {  $query->where('nom', 'like','%'.$v.'%' ); } ); 
            } );
    }
  
  return view('Fonctionnaire.home',['registres' =>  $q->paginate(10)]);

}
   public function indexReclamation(){
      $id=Auth::user()->id;
      $reclamation=Reclamation::where('users_id',$id)->orderByDesc('id')->get();
   
    return view('Fonctionnaire.reclamation',['reclamation' => $reclamation ]);
   }

   public function destroy($id){

    $reclamation = Reclamation::find($id);
    $reclamation->delete();
   
  
    return redirect()->back()->with('success','Supprimé avec succès');

   }

   public function displayM(Request $r)
   {
      $registre=Registre::find($r['id']);
      $materiel=Materiel::find($registre->materiels_id);
 
     return view('Fonctionnaire.afiche',['materiel' => $materiel ]);
   }


}
