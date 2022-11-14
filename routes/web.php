<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CandidacyController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

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
    return redirect('jobs');
});
Route::get('/can', function () {
    return view('/company/candidacies');
});
Route::get('/c', function () {
    return view('company/profil');
});
Route::get('/j', function () {
    return view('company/candidacies');
});
Route::get('/r', function () {
    return view('resetPassword');
});
Route::get('/connexion', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});
Route::get('/ap', function () {
    return view('candidats/myApply');
});
Route::post('/login', [ userController::class, 'connexion' ]);
Route::get('/jobs',[JobController::class,'showJob']);
Route::get('/details/{id}',[JobController::class,'detailsJob']);



Route::get('/admin/settings', [AdminController::class, 'getSettings']);
Route::get('/admin/deleteC/{id}', [AdminController::class, 'deleteCategorie']);
Route::get('/admin/deleteT/{id}', [AdminController::class, 'deleteType']);
Route::post('/save_type', [AdminController::class, 'savetype']);
Route::post('/save_categorie', [AdminController::class, 'saveCategory']);

Route::get('/addJob',[JobController::class,'newJob']);
Route::post('/save_job',[JobController::class,'saveJob']);
Route::get('/jobList',[JobController::class,'companyJob']);

Route::get('/{id}/candidacies',[CandidacyController::class,'showCandidacies'])->name('candidate');


Route::get('/applications',[CandidacyController::class,'showApply']);
Route::post('/apply/{id}',[CandidacyController::class,'saveCandidacy']);


Route::post('/save_candidate', [userController::class, 'saveCandidate']);
Route::post('/save_company', [userController::class, 'saveCompany']);
Route::get('/disconnect', [userController::class, 'deconnection']);
Route::get('/allCandidates', [userController::class, 'showCandidate' ]);
Route::get('/profil', [userController::class, 'showProfil']);
Route::post('/save_profil', [userController::class, 'updateProfil']);
Route::post('/update_password', [userController::class, 'updatePass']);

