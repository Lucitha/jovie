<?php

use App\Http\Controllers\AdminController;
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
    return view('candidats/profils');
});
Route::get('/c', function () {
    return view('company/profil');
});
Route::get('/j', function () {
    return view('company/job');
});
Route::get('/r', function () {
    return view('resetPassword');
});
Route::get('/l', function () {
    return view('login');
});
Route::get('/re', function () {
    return view('register');
});
Route::get('/s', function () {
    return view('admin/settings');
});
Route::get('/admin/settings', [ AdminController::class, 'getSettings' ]);
Route::get('/admin/deleteC/{id}', [ AdminController::class, 'deleteCategorie' ]);
Route::get('/admin/deleteT/{id}', [ AdminController::class, 'deleteType' ]);
Route::post('/save_type', [ AdminController::class, 'savetype' ]);
Route::post('/save_categorie', [ AdminController::class, 'saveCategory' ]);

Route::get('/addJob',[JobController::class,'newJob']);
Route::post('/save_job',[JobController::class,'saveJob']);


Route::post('/save_candidate', [ userController::class, 'saveCandidate' ]);
Route::get('/allCandidates', [ userController::class, 'showCandidate' ]);
Route::post('/save_company', [ userController::class, 'saveCompany' ]);
