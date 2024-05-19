<?php

namespace App\Http\Controllers;

use App\Http\Requests\MaterielRequest;
use App\Http\Requests\MaterielRequestUpdate;
use App\Models\Categorie;
use App\Models\Etat;
use App\Models\Marque;
use App\Models\Materiel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Facades\Storage;

class GestionnairesStockController extends Controller
{
    public function index()
{
    $materiels = Materiel::paginate(8);
    $categories = Categorie::orderBy('nom')->get();
    $marques =Marque::orderBy('nom')->get();
        return view('gestionnairestock.home', ['materiels' =>$materiels ,'marques'=>$marques ,'categories'=>$categories ]);
}


    public function search(Request $r)
{
  
  $q = Materiel::query(); 

  
  if($r->has('categories_id') && ($r->input('categories_id') != 'Choisir une categorie')){
      $v = $r->input('categories_id');
      $q->where('categories_id','=', $v );
  }

  if($r->has('marques_id') && ($r->input('marques_id') != 'Choisir une marque')){
      $v = $r->input('marques_id');
      $q->where('marques_id','=', $v );
  }

  if($r->has('nom') && ($r->input('nom') != null)){
      $v = $r->input('nom');
      $q->where('nom','like','%'.$v.'%');
  }

  if($r->has('model') && ($r->input('model') != null)){
      $v = $r->input('model');
      $q->where('model','like','%'.$v.'%');
  }
  
  if($r->has('barcode') && ($r->input('barcode') != null)){
    $v = $r->input('barcode');
    $q->where('barcode','like','%'.$v.'%');
}
  

$categories = Categorie::orderBy('nom')->get();
$marques =Marque::orderBy('nom')->get();
$materiels=$q->paginate(10);

return view('gestionnairestock.home', ['materiels' =>$materiels,'marques'=>$marques ,'categories'=>$categories ]);

}


public function destroy(Request $r)
  {
    $destroyMateriel=Materiel::find($r['id']);
    Storage::delete($destroyMateriel->image);
    $destroyMateriel->delete();
    return redirect()->back()->with('success','Supprimé avec succès');
  }

  public function fill()
  {
    $categories = Categorie::orderBy('nom')->get();
    $marques =Marque::orderBy('nom')->get();
    return view('gestionnairestock.ajouter',['materiels'=> null,'marques'=>$marques ,'categories'=>$categories ]);
  }

  public function create(MaterielRequest $a)
  {
    $r=$a->validated();
    
    $fileName=$a->file('image')->getClientOriginalName();
    $filePath = $a->file('image')->storeAs('uploads', $fileName, 'public');

    Materiel::insert([
        'nom'=> $r['nom'],
        'model'=>$r['model'],
        'description'=>$r['description'],
        'quantite'=>$r['quantite'],
        'barcode'=>$r['barcode'],
        'date'=>$r['date'],
        'categories_id' =>$r['categories_id'] ,
        'marques_id'=>$r['marques_id'] ,
        'image'=> "/storage"."/".$filePath 
      ]); 
      

      return redirect()->route('GestionnairesStock.index')
      ->with('success','Ajouté avec succès');
  }


  public function fillEdit(Request $r)
  {
    $materiel=Materiel::find($r['id']);
    $categories = Categorie::orderBy('nom')->get();
    $marques =Marque::orderBy('nom')->get();
    return view('gestionnairestock.modifie',['materiels'=> $materiel ,'marques'=>$marques ,'categories'=>$categories]);
  }


  public function edit(MaterielRequestUpdate $a)
  {  
    
    $r=$a->validated();
    $materiel=Materiel::find($r['id']);
    if($a->has('image')){
     
     $fileName=$a->file('image')->getClientOriginalName();
     $filePath = $a->file('image')->storeAs('uploads', $fileName, 'public');

     $materiel->categories_id=$r['categories_id'];
     $materiel->marques_id=$r['marques_id'];
     $materiel->save();

     $materiel->update([
      'nom'=> $r['nom'],
      'model'=>$r['model'],
      'description'=>$r['description'],
      'quantite'=>$r['quantite'],
      'barcode'=>$r['barcode'],
      'date'=>$r['date'],
      'image'=> "/storage"."/".$filePath 
    ]);
 
    return redirect()->route('GestionnairesStock.index')
      ->with('success','modifié avec succès');
    }else{
      
      $materiel->categories_id=$r['categories_id'];
      $materiel->marques_id=$r['marques_id'];
      $materiel->save();

      $materiel->update([
        'nom'=> $r['nom'],
        'model'=>$r['model'],
        'description'=>$r['description'],
        'quantite'=>$r['quantite'],
        'barcode'=>$r['barcode'],
        'date'=>$r['date'],
      ]);
   
      return redirect()->route('GestionnairesStock.index')
        ->with('success','modifié avec succès');
    }
  }

  
  
  public function display(Request $r)
  {
    $materiel=Materiel::find($r['id']);
    $nomcategorie=$materiel->categorie()->first();
    $nommarque=$materiel->marque()->first();
    $caracteristiques=$materiel->caracteristique()->get();
    return view('gestionnairestock.Affiche',['materiel' =>$materiel ,'nommarque'=>$nommarque ,'nomcategorie'=>$nomcategorie ,'caracteristiques'=>$caracteristiques]);
  }

  public function refer()
  {}




}