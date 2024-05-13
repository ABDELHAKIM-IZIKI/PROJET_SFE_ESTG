<?php

namespace App\Http\Controllers;

use App\Http\Requests\MaterielRequest;
use App\Models\Categorie;
use App\Models\Marque;
use App\Models\Materiel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GestionnairesStockController extends Controller
{
    public function index()
{
    $materiels = Materiel::paginate(8);
    $categories = Categorie::all();
    $marques =Marque::all();
        return view('gestionnairestock.home', ['materiels' =>$materiels ,'marques'=>$marques ,'categories'=>$categories ]);
}


    public function search(Request $r)
{
  
  $q = Materiel::query(); 

  
  if($r->has('categories_id') && ($r->input('categories_id') != 'Choisir un categorie')){
      $v = $r->input('categories_id');
      $q->where('categories_id','=', $v );
  }

  if($r->has('marques_id') && ($r->input('marques_id') != 'Choisir un marque')){
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
  

$categories = Categorie::all();
$marques =Marque::all();
$materiels=$q->paginate(10);

return view('gestionnairestock.home', ['materiels' =>$materiels,'marques'=>$marques ,'categories'=>$categories ]);

}


public function destroy(Request $r)
  {
    $destroyMateriel=Materiel::find($r['id']);
    Storage::delete($destroyMateriel->image);
    $destroyMateriel->delete();
    return redirect()->back()->with('success','supprimé avec succès');
  }

  public function fill()
  {
    $categories = Categorie::all();
    $marques =Marque::all();
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
      ->with('success','ajouté avec succès');
  }


  public function fillEdit()
  {

  }

  public function edit()
  {}

  public function display($id)
  {}

  public function refer()
  {}




}