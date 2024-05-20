<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReclamationRequest;
use App\Models\Materiel;
use App\Models\Reclamation;
use App\Models\Registre;
use Illuminate\Http\Request;

class FonctionnaireController extends Controller
{
   public function index($id=17)
   { 
      return  view('Fonctionnaire.home',['registres' => Registre::where('users_id',$id)->paginate(10)]);
   }

public function Reclamé(ReclamationRequest $a){
    $r=$a->validated();

    Reclamation::insert($r);

    return redirect()->route('Fonctionnaire.index')->with('success','Reclamé avec succès');


}

public function search(Request $r)
{ 
    $id=17;
    $q = Registre::where('users_id' , $id); 
 
    if($r->has('valeur') && ($r->input('valeur') != null)){
        $v = $r->input('valeur');
        $q->whereHas('materiel',  function ($query) use ( $v  )  
        {  $query->where('model', 'like','%'.$v.'%' )
                ->orWhere('marques_id','like', '%'.$v.'%' )
                ->orwhere('nom','like','%'.$v.'%')
                ->orWhere('barcode','like','%'.$v.'%')
                ->whereHas('marque',  function ($query) use ( $v  )
                {  $query->where('nom', 'like','%'.$v.'%' ); } ); 
            } );
    }


    $q->paginate(10);
  
  return view('Fonctionnaire.home',['registres' => $q ]);

}
   public function indexReclamation($id=17){
      $reclamation=Reclamation::where('users_id',$id)->get();
      $registre=Registre::fin($reclamation->registres_id);
     
    return view('Fonctionnaire.reclamation',['reclamation' => $reclamation , 'registre' =>  $registre  ]);
   }

   public function destroy($id){

    $reclamation = Reclamation::find($id);
    $reclamation->delete();
   
  
    return redirect()->back()->with('success','Supprimé avec succès');

   }
}
