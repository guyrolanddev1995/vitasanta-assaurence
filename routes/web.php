<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\VilleController;
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

Route::group(['middleware' => ['auth']], function() {
    Route::view('ville', 'pages.ville')->name('admin.ville');
    Route::view('transporteur', 'pages.transporteur')->name('admin.transporteur');
    Route::view('agent', 'pages.agent')->name('admin.agent');
    Route::get('souscribe', [HomeController::class, 'getSouscribe'])->name('admin.souscribe');

    Route::get('/home', [HomeController::class, 'index'])->name('admin.home');
    Route::get('/', [HomeController::class, 'index'])->name('admin.home');
});

Auth::routes();
