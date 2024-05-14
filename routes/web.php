<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\GestionnairesStockController;
use App\Http\Controllers\MarqueController;
use App\Http\Controllers\RegistreController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


//Home
Route::get('/MonSite', [HomeController::class ,'index'])->name('home');
//contact
Route::get('/MonSite/Contact', [HomeController::class ,'contact'])->name('contact');


//Administrateur
Route::get('/MonSite/Administrateur', [AdminController::class ,'index'])->name('admin.index');
Route::get('/MonSite/Administrateur/recherche', [AdminController::class ,'search'])->name('admin.search');
Route::get('/MonSite/Administrateur/remplir', [AdminController::class ,'fill'])->name('admin.fill');
Route::post('/MonSite/Administrateur/crée', [AdminController::class ,'create'])->name('admin.create');
Route::delete('/MonSite/Administrateur/supprimé', [AdminController::class ,'destroy'])->name('admin.destroy');
Route::get('/MonSite/Administrateur/remplir-modifie', [AdminController::class ,'fillEdit'])->name('admin.filledit');
Route::post('/MonSite/Administrateur/modifie', [AdminController::class ,'edit'])->name('admin.edit');
//Role
Route::get('/MonSite/Administrateur/Role', [RoleController::class ,'index'])->name('role.index');
Route::get('/MonSite/Administrateur/Role/remplir', [RoleController::class ,'fill'])->name('role.fill');
Route::get('/MonSite/Administrateur/Role/recherche', [RoleController::class ,'search'])->name('role.search');
Route::post('/MonSite/Administrateur/Role/crée', [RoleController::class ,'create'])->name('role.create');
Route::delete('/MonSite/Administrateur/Role/supprimé', [RoleController::class ,'destroy'])->name('role.destroy');
Route::get('/MonSite/Administrateur/Role/remplir-modifie', [RoleController::class ,'fillEdit'])->name('role.filledit');
Route::post('/MonSite/Administrateur/Role/modifie', [RoleController::class ,'edit'])->name('role.edit');


//GestionnairesStock 
Route::get('/MonSite/GestionnaireStock', [GestionnairesStockController::class ,'index'])->name('GestionnairesStock.index');
Route::get('/MonSite/GestionnaireStock/recherche', [GestionnairesStockController::class ,'search'])->name('gestionnairestock.search');
Route::delete('/MonSite/GestionnaireStock/supprimé', [GestionnairesStockController::class ,'destroy'])->name('gestionnairestock.destroy');
Route::get('/MonSite/GestionnaireStock/remplir-modifie', [GestionnairesStockController::class ,'fillEdit'])->name('gestionnairestock.filledit');
Route::post('/MonSite/GestionnaireStock/modifie', [GestionnairesStockController::class ,'edit'])->name('gestionnairestock.edit');
Route::get('/MonSite/GestionnaireStock/remplir', [GestionnairesStockController::class ,'fill'])->name('gestionnairestock.fill');
Route::post('/MonSite/GestionnaireStock/crée', [GestionnairesStockController::class ,'create'])->name('gestionnairestock.create');
Route::get('/MonSite/GestionnaireStock/Materiel-{id}', [GestionnairesStockController::class ,'display'])->name('GestionnairesStock.display');
Route::post('/MonSite/GestionnaireStock/affectation', [GestionnairesStockController::class ,'refer'])->name('gestionnairestock.refer');


//Categorie
Route::get('/MonSite/GestionnaireStock/Categorie', [CategorieController::class ,'index'])->name('Categorie.index');
Route::get('/MonSite/GestionnaireStock/Categorie/recherche', [CategorieController::class ,'search'])->name('Categorie.search');
Route::delete('/MonSite/GestionnaireStock/Categorie/supprimé', [CategorieController::class ,'destroy'])->name('Categorie.destroy');
Route::post('/MonSite/GestionnaireStock/Categorie/crée', [CategorieController::class ,'create'])->name('Categorie.create');
Route::post('/MonSite/GestionnaireStock/Categorie/modifie', [CategorieController::class ,'edit'])->name('Categorie.edit');





//Registre
Route::get('/MonSite/GestionnaireStock/Registre', [RegistreController::class ,'index'])->name('Registre.index');

//Marque
Route::get('/MonSite/GestionnaireStock/Marque', [MarqueController::class ,'index'])->name('Marque.index');


Route::get('/test', function(){
    return view('test');
});

