<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReclamationMantenancierRequest;
use App\Models\Etat;
use App\Models\Reclamation;
use App\Models\Registre;
use Illuminate\Http\Request;

class MaintenancierController extends Controller
{
    
    public function index()
    {
         $reclamation=Reclamation::orderByDesc('id')->orderByDesc('vue')->get();

         return view('Maintenancier.reclamation' , ['reclamation'=> $reclamation ,'etats' => Etat::all() ]);
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
