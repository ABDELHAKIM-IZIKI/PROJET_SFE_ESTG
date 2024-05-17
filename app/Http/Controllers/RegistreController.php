<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestRegistre;
use App\Http\Requests\RequestRegistreUpdate;
use App\Models\Etat;
use App\Models\Materiel;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

use App\Models\Registre;
use App\Models\User;
use Illuminate\Http\Request;

class RegistreController extends Controller
{
    public function index(){
      
        return view('gestionnairestock.Registre.home',['registres'=> Registre::paginate(15) ]);
    }

    public function search(Request $r)
    {
      
      $q = Registre::query(); 
      
      if ($r->has('valeur')) { 
        $valeur = "%".$r->input('valeur')."%";
         $q->whereHas('Registre',  function ($query) use ($valeur )  {  $query->where('nom', 'like',  $valeur )->orWhere('prenom','like', $valeur ); } ); 
         $q->orwhereHas('materiel',  function ($query) use ($valeur )  {  $query->where('nom', 'like',  $valeur )->orWhere('model','like', $valeur ); } );
         $q->orwhere('lieu','like', $valeur );
    }
      
      $registres=$q->paginate(15);
     
      return view('gestionnairestock.Registre.home', ['registres'=>$registres]);
  }

  public function display($id){

    $registre=Registre::find($id);

    return view('gestionnairestock.Registre.Affiche', ['registre'=>$registre ]);
  }

  public function downloadQR($id){

    $data = QrCode::size(512)
    ->format('png') 
    ->merge('/public/assets/images/Logo_Agadir.png')
    ->errorCorrection('M')
    ->generate(
        route('Registre.display',$id)
    );

    $filename = 'QRcode-' . $id . '.png';
    

    file_put_contents(public_path('qrcodes/' . $filename), $data);

    
    $headers = [
        'Content-Type' => 'image/png',
    ];

    $filePath = public_path('qrcodes/' . $filename);

   
    return  response()->download($filePath, $filename, $headers);
 
 
}

public function destroy($id){
  $destroyRegistre=Registre::find($id);
    $destroyRegistre->delete();
    return redirect()->route('Registre.index')->with('success','Supprimé avec succès');
}

public function filledit($id){
  $registre=Registre::find($id);
  $etat=Etat::all();
  return view('gestionnairestock.Registre.modifie', ['registre'=>$registre ,'etat' => $etat]);
}

public function edit(RequestRegistreUpdate $a){
  
  $r=$a->validated();
  $registreupdate=Registre::find($r['id']);
  $registreupdate->update([
    'etats_id' =>$r['etats_id'],
    'rapport' =>$r['rapport'],
    'lieu' =>$r['lieu'],
    'date' =>$r['date']]
  );
  return redirect()->route('Registre.index')->with('success','Modifié avec succès');
}

public function filleAffectation($id){

  return view('gestionnairestock.Registre.Ajouter' , ['materiels_id' => $id , 
                                                      'users' => User::orderBy('nom')->orderBy('prenom')->paginate(5),
                                                       'etats'=>Etat::all()]);
}

public function refer(RequestRegistre $a){
  $r=$a->validated();
  dd( $r);
  
  Registre::insert($r);

  return redirect()->route('Registre.index')->with('success','Affectation avec succès');
}



}