<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CaracteristiqueController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\FonctionnaireController;
use App\Http\Controllers\GestionnairesStockController;
use App\Http\Controllers\MaintenancierController;
use App\Http\Controllers\MarqueController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistreController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

//Home
Route::get('/MonSite', [HomeController::class ,'index'])->name('home');



//Administrateur
Route::middleware(['auth','role:Administrateur'])->group(function () {
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
});



Route::middleware(['auth','role:Gestionnaire de stock'])->group(function () {
//GestionnairesStock 
Route::get('/MonSite/GestionnaireStock', [GestionnairesStockController::class ,'index'])->name('GestionnairesStock.index');
Route::get('/MonSite/GestionnaireStock/recherche', [GestionnairesStockController::class ,'search'])->name('gestionnairestock.search');
Route::delete('/MonSite/GestionnaireStock/supprimé', [GestionnairesStockController::class ,'destroy'])->name('gestionnairestock.destroy');
Route::get('/MonSite/GestionnaireStock/remplir-modifie', [GestionnairesStockController::class ,'fillEdit'])->name('gestionnairestock.filledit');
Route::post('/MonSite/GestionnaireStock/modifie', [GestionnairesStockController::class ,'edit'])->name('gestionnairestock.edit');
Route::get('/MonSite/GestionnaireStock/remplir', [GestionnairesStockController::class ,'fill'])->name('gestionnairestock.fill');
Route::post('/MonSite/GestionnaireStock/crée', [GestionnairesStockController::class ,'create'])->name('gestionnairestock.create');
Route::get('/MonSite/GestionnaireStock/Materiel-{id}', [GestionnairesStockController::class ,'display'])->name('GestionnairesStock.display');
//Caracteristique 
Route::delete('/MonSite/Caracteristique/supprimé/{id}', [CaracteristiqueController::class ,'delete'])->name('Caracteristique.delete');
Route::post('/MonSite/Caracteristique/Ajouter', [CaracteristiqueController::class ,'add'])->name('Caracteristique.create');
Route::post('/MonSite/Caracteristique/modifie', [CaracteristiqueController::class ,'edit'])->name('Caracteristique.modifie');
//Categorie
Route::get('/MonSite/GestionnaireStock/Categorie', [CategorieController::class ,'index'])->name('Categorie.index');
Route::get('/MonSite/GestionnaireStock/Categorie/recherche', [CategorieController::class ,'search'])->name('Categorie.search');
Route::delete('/MonSite/GestionnaireStock/Categorie/supprimé', [CategorieController::class ,'destroy'])->name('Categorie.destroy');
Route::post('/MonSite/GestionnaireStock/Categorie/crée', [CategorieController::class ,'create'])->name('Categorie.create');
Route::post('/MonSite/GestionnaireStock/Categorie/modifie', [CategorieController::class ,'edit'])->name('Categorie.edit');
//Marque
Route::get('/MonSite/GestionnaireStock/Marque', [MarqueController::class ,'index'])->name('Marque.index');
Route::get('/MonSite/GestionnaireStock/Marque/recherche', [MarqueController::class ,'search'])->name('Marque.search');
Route::delete('/MonSite/GestionnaireStock/Marque/supprimé', [MarqueController::class ,'destroy'])->name('Marque.destroy');
Route::post('/MonSite/GestionnaireStock/Marque/crée', [MarqueController::class ,'create'])->name('Marque.create');
Route::post('/MonSite/GestionnaireStock/Marque/modifie', [MarqueController::class ,'edit'])->name('Marque.edit');
//Registre   
Route::get('/MonSite/GestionnaireStock/Registre', [RegistreController::class ,'index'])->name('Registre.index');
Route::get('/MonSite/GestionnaireStock/Registre/recherche', [RegistreController::class ,'search'])->name('Registre.search');

Route::get('/MonSite/GestionnaireStock/Registre/registre-downloadQR-{id}', [RegistreController::class ,'downloadQR'])->name('Registre.downloadQR');
Route::delete('/MonSite/GestionnaireStock/Registre/supprimé-{id}', [RegistreController::class ,'destroy'])->name('Registre.destroy'); 
Route::get('/MonSite/GestionnaireStock/Registre/remplir-modifie-{id}', [RegistreController::class ,'filledit'])->name('Registre.filledit');
Route::post('/MonSite/GestionnaireStock/Registre/modifie', [RegistreController::class ,'edit'])->name('Registre.edit');
Route::get('/MonSite/GestionnaireStock/Registre/remplir-affectation-{id}', [RegistreController::class ,'filleAffectation'])->name('Registre.filleAffectation');
Route::post('/MonSite/GestionnaireStock/Registre/affectation', [RegistreController::class ,'refer'])->name('Registre.refer');
Route::get('/MonSite/GestionnaireStock/Registre/affectation/recherche', [RegistreController::class ,'SearchUser'])->name('Registre.SearchUser');
});


Route::middleware(['auth','role:Fonctionnaire'])->group(function () {
//Fonctionnaire
Route::get('/MonSite/Fonctionnaire', [FonctionnaireController::class ,'index'])->name('Fonctionnaire.index');
Route::get('/MonSite/Fonctionnaire/Reclamation', [FonctionnaireController::class ,'indexReclamation'])->name('Fonctionnaire.Reclamation.index');
Route::post('/MonSite/Fonctionnaire/Reclamé', [FonctionnaireController::class ,'Reclamé'])->name('Fonctionnaire.add');
Route::get('/MonSite/Fonctionnaire/Recherche', [FonctionnaireController::class ,'search'])->name('Fonctionnaire.search');
Route::delete('/MonSite/Fonctionnaire/supprimé-{id}', [FonctionnaireController::class ,'destroy'])->name('Fonctionnaire.destroy'); 
Route::get('/MonSite/Fonctionnaire/Registre/Materiel-{id}', [FonctionnaireController::class ,'displayM'])->name('Fonctionnaire.displayM');
});

//registre display
Route::middleware(['auth' , 'role:Maintenancier,Gestionnaire de stock' ])->group(function () {
    Route::get('/MonSite/Registre-{id}', [RegistreController::class ,'display'])->name('Registre.display');
});

Route::middleware(['auth','role:Maintenancier'])->group(function () {
//Maintenancier     
Route::get('/MonSite/Maintenancier', [MaintenancierController::class ,'index'])->name('Maintenancier.index');
Route::delete('/MonSite/Maintenancier/supprimé-{id}', [MaintenancierController::class ,'destroy'])->name('Maintenancier.destroy');
Route::post('/MonSite/Maintenancier/vue', [MaintenancierController::class ,'vue'])->name('Maintenancier.vue');
Route::delete('/MonSite/Maintenancier/remove', [MaintenancierController::class ,'remove'])->name('Maintenancier.remove');
Route::get('/MonSite/Maintenancier/Registre/recherche', [MaintenancierController::class ,'search'])->name('Maintenancier.search');

});

// Authentication Routes
Route::get('/MonSite/Connexion', [AuthController::class, 'loginpage'])->name('Auth.loginpage'); 
Route::post('/MonSite/Connexion/Login', [AuthController::class, 'login'])->name('Auth.login');
Route::post('/MonSite/Connexion/Logout', [AuthController::class, 'Logout'])->name('Auth.Logout');

// Password Reset Routes
Route::get('/MonSite/ModifieMDP', [PasswordResetController::class, 'pageReset'])->name('Auth.pageReset');
Route::post('/MonSite/CheckCode', [PasswordResetController::class, 'sendCode'])->name('Auth.sendCode');
Route::post('/MonSite/MDPchangepage', [PasswordResetController::class, 'MDP_change_page'])->name('Auth.MDP_change_page');
Route::post('/MonSite/MDPConfirmation', [PasswordResetController::class, 'MDP_change'])->name('Auth.MDP_change');

//role Banned  
Route::get('/MonSite/Error', [AuthController::class ,'Banned'])->name('Banned');



Route::middleware(['auth'])->group(function () {
//profile
Route::get('/MonSite/Profile', [ProfileController::class, 'index'])->name('profile.index');
Route::get('/MonSite/Modifier_Profile', [ProfileController::class, 'filledit'])->name('profile.filledit');
Route::get('/MonSite/Change_MDP_Profile', [ProfileController::class, 'filleditmdp'])->name('profile.filleditmdp');
Route::post('/MonSite/Modifier_Profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/MonSite/Change_MDP_Profile/edit', [ProfileController::class, 'editmdp'])->name('profile.editmdp');
});


Route::get('/test', function(){
    
    return null ; 


});