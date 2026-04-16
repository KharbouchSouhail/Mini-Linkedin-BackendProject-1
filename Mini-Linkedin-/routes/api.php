<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileCompetenceController;
use App\Http\controllers\CandidatureController;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminOffreController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



#===================PROFILE: cree afficher update ===================
Route::post('/profil', [ProfileController::class, 'store']);
Route::get('/profil', [ProfileController::class, 'show']);
Route::put('/profil', [ProfileController::class, 'update']);
#===================Competences: cree afficher delete ===================
Route::post('/profil/competences', [ProfileCompetenceController::class, 'store']);
Route::delete('/profil/competences/{competence}', [ProfileCompetenceController::class, 'destroy']);

#===================Candidatures for condidat : cree afficher delete ===================
Route::get('/offres', [OffreController::class, 'index']);
Route::get('/offres/{offre}', [OffreController::class, 'show']);

#===================Offre pour le recruteur ============================================
Route::post('/offres', [OffreController::class, 'store']);
Route::put('/offres/{offre}', [OffreController::class, 'update']);
Route::delete('/offres/{offre}', [OffreController::class, 'destroy']);

#==================== postuler pour une condidature ===================================
Route::post('/offres/{offre}/candidater', [CandidatureController::class, 'store']);
Route::get('/mes-candidatures', [CandidatureController::class, 'myApplications']);



#====================chager la condidatur pou recruteur=================================
Route::get('/offres/{offre}/candidatures', [CandidatureController::class, 'offreCandidatures']);
Route::patch('/candidatures/{candidature}/statut', [CandidatureController::class, 'updateStatus']);



#======================lister et supprimer les utilisateurs pour l'admin ============================
Route::get('/admin/users', [AdminUserController::class, 'index']);
Route::delete('/admin/users/{user}', [AdminUserController::class, 'destroy']);


#======================activer ou désactiver une offre pour l'admin ============================
Route::patch('/admin/offres/{offre}', [AdminOffreController::class, 'toggleActive']);