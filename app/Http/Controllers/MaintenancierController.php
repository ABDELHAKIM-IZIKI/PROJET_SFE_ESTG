<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReclamationMantenancierRequest;
use App\Models\Etat;
use App\Models\Reclamation;
use Illuminate\Http\Request;

class MaintenancierController extends Controller
{
    
    public function index()
    {
         $reclamation=Reclamation::orderByDesc('id')->orderByDesc('vue')->get();

         return view('Maintenancier.reclamation' , ['reclamation'=> $reclamation ,'etats' => Etat::all() ]);
    }

    public function destroy($id)
    {
        $reclamation = Reclamation::find($id);
        $reclamation->delete();
       
      
        return redirect()->back()->with('success','Supprimé avec succès');
    }

    public function vue(ReclamationMantenancierRequest $r)
    {     $va=$r->validated();

        $reclamation = Reclamation::find($r['id']);
        $reclamation->update( 
            ['vue'  =>  $r['vue'] 
        ]);
        return redirect()->back(); 
    }

}
