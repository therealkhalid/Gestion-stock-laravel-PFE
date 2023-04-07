<?php

use App\Http\Controllers\AdminCatalogue;
use App\Http\Controllers\AdminCommand;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminLivraison;
use App\Http\Controllers\AdminPaiement;
use App\Http\Controllers\AdminReclamation;
use App\Http\Controllers\ClientCommand;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\FournisseurController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientProfile;
use App\Http\Controllers\ClientReclamation;
use App\Http\Controllers\FournisseurCatalogue;
use App\Http\Controllers\livreurController;
use App\Http\Controllers\LivreurLivraison;
use App\Http\Controllers\ProfileClient;
use App\Http\Controllers\ProfileFournisseur;
use App\Http\Controllers\ProfileLivreur;
use App\Models\admin;
use Illuminate\Database\Console\ShowCommand;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::middleware(['auth'])->group(function(){
    Route::get('/home',[HomeController::class,'index'])->name('home');
    
});
// client Route
Route::middleware(['auth','user-role:client'])->group(function()
{
    
    Route::get("/client/home",[ClientController::class,'afficher'])->name('home.client');
    Route::resource('/client/commande',ClientCommand::class);
    Route::resource('/reclamation',ClientReclamation::class);
    Route::resource('/client/pro',ProfileClient::class);
    
});

// Admin Route
Route::middleware(['auth','user-role:admin'])->group(function()
{
    Route::get("/admin/home",[AdminController::class,'afficher'])->name('home.admin');
    Route::resource('/admins',AdminController::class);
    Route::resource('/commandes',AdminCommand::class);
    Route::resource('/paiement',AdminPaiement::class);
    Route::resource('/livraison',AdminLivraison::class);
    Route::resource('/client',ClientController::class);
    Route::resource('/fournisseures',FournisseurController::class);
    Route::resource('/livreurs',livreurController::class);
    Route::resource('/claim',AdminReclamation::class);
    Route::resource('/catalog',AdminCatalogue::class);
});
// livreur Route
Route::middleware(['auth','user-role:livreur'])->group(function()
{
    Route::get("/livreur/home",[livreurController::class,'afficher'])->name('home.livreur');
    Route::resource('/livraisons',LivreurLivraison::class);
    Route::resource('/livreur/profile',ProfileLivreur::class);
});
// fournisseur Route
Route::middleware(['auth','user-role:fournisseur'])->group(function()
{
    Route::get("/fournisseur/home",[FournisseurController::class,'afficher'])->name('home.fournisseur');
        Route::resource('/catalogue',FournisseurCatalogue::class);
        Route::resource('/profile_fournisseur',ProfileFournisseur::class);
    
});


