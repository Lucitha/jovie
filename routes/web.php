<?php

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

