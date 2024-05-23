<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReclamationMantenancierRequest;
use App\Models\Etat;
use App\Models\Reclamation;
use App\Models\Registre;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Caster\RedisCaster;

class MaintenancierController extends Controller
{
    
    public function index()
    {
         $reclamation=Reclamation::orderByDesc('id')->orderByDesc('vue')->get();

         return view('Maintenancier.reclamation' , ['reclamation'=> $reclamation ,'etats' => Etat::all() ]);
    }

     public function search(Request $r) {
    $q = Reclamation::query();
    
    if ( $r->has('valeur') && ($r->input('valeur') != null) ) {
        $v = '%' . $r->input('valeur') . '%';
        $q->orWhereHas('user', function ($query) use ($v) {
            $query->orWhere('nom', 'like', $v)
                  ->orWhere('prenom', 'like', $v)
                  ->orWhere('division', 'like', $v)
                  ->orWhere('service', 'like', $v);
        })
        ->orWhereHas('registre', function ($query) use ($v) {
            $query->orWhere('lieu', 'like', $v)
                  ->orWhereHas('materiel', function ($query) use ($v) {
                      $query->orWhere('nom', 'like', $v)
                            ->orWhere('model', 'like', $v);
                  });
        });
    }
  
   $t= $q->orderByDesc('id')->orderByDesc('vue')->get();
  
    return view('Maintenancier.reclamation', ['reclamation' => $t , 'etats' => Etat::all()]);
}



    public function vue(Request $r)
    {    

        $reclamation = Reclamation::find($r['id']);
        $reclamation->update( 
            ['vue'  =>  $r['vue'] 
        ]);
        return redirect()->back(); 
    }

    public function remove(ReclamationMantenancierRequest $r)
{
    $va=$r->validated();
   
    $registre=Registre::find($va['registre_id']);
    $registre->update([
        'etats_id' => $va['etat'] ,
        'rapport' => $va['rapport'] 
    ]);

    $reclamation=Reclamation::find($va['reclamastion_id']);
    $reclamation->delete();

    return redirect()->back()->with('success','Supprimé avec succès');
}
}
