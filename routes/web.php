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
    return redirect('search');
});
Route::get('/s', function () {
    return view('search');
});
// Route::get('/reset/', function () {
//     return view('reset');
// });
Route::get('/connexion', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});
Route::get('/reset', function () {
    return view('resetAsking');
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
Route::get('/postDelete/{id}',[JobController::class,'deletePost']);
Route::get('/editPost/{id}',[JobController::class,'editPost']);
Route::get('/company/{id}',[JobController::class,'jobByCompany']);
Route::get('/search',[JobController::class,'search']);
Route::post('/searching',[JobController::class,'searching']);
Route::get('/typeJob/{id}',[JobController::class,'jobtype']);
Route::post('/updateJob/{id}',[JobController::class,'updatePost']);

Route::get('/{id}/candidacies',[CandidacyController::class,'showCandidacies'])->name('candidate');

Route::get('/applications',[CandidacyController::class,'showApply']);
Route::post('/resum/{id}',[CandidacyController::class,'resum']);
Route::post('/apply/{id}',[CandidacyController::class,'saveCandidacy']);

Route::post('/save_candidate', [userController::class, 'saveCandidate']);
Route::post('/save_company', [userController::class, 'saveCompany']);
Route::get('/reset/{id}/{link}', [userController::class, 'resetView']);
Route::get('/disconnect', [userController::class, 'deconnection']);
Route::get('/allCandidates', [userController::class, 'showCandidate' ]);
Route::get('/profil', [userController::class, 'showProfil']);
Route::post('/save_profil', [userController::class, 'updateProfil']);
Route::post('/socialLink', [userController::class, 'socialLink']);
Route::post('/update_password', [userController::class, 'updatePass']);
Route::post('/newPassword', [userController::class, 'reset']);
Route::post('/resetAsk', [userController::class, 'resetPassword']);
Route::get('/candidates', [userController::class, 'showCandidates']);
Route::get('/companies', [userController::class, 'showCompanies']);

