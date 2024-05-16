<?php

namespace App\Http\Controllers;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

use App\Models\Registre;
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
         $q->whereHas('user',  function ($query) use ($valeur )  {  $query->where('nom', 'like',  $valeur )->orWhere('prenom','like', $valeur ); } ); 
         $q->orwhereHas('materiel',  function ($query) use ($valeur )  {  $query->where('nom', 'like',  $valeur )->orWhere('model','like', $valeur ); } );
         $q->orwhere('lieu','like', $valeur );
    }
      
      $registres=$q->paginate(15);
     
      return view('gestionnairestock.Registre.home', ['registres'=>$registres]);
  }

  public function display($id){
dd($id);

  }

  public function downloadQR($id){
    
    $data = QrCode::size(512)
    ->format('png') 
    ->merge('/public/assets/images/Logo_Agadir.png')
    ->errorCorrection('M')
    ->generate(
        'http://192.168.100.138:8000/MonSite/GestionnaireStock/Registre'.$id
    );

    $filename = 'QRcode-' . $id . '.png';
    

    file_put_contents(public_path('qrcodes/' . $filename), $data);

    
    $headers = [
        'Content-Type' => 'image/png',
    ];

    $filePath = public_path('qrcodes/' . $filename);

   
    return  response()->download($filePath, $filename, $headers);
 
 
}
}
