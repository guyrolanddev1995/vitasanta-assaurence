<?php

use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\LivreurController;
use App\Http\Controllers\Api\VehiculeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::get('villes', [HomeController::class, 'getVilles']);
    Route::get('transporteurs', [HomeController::class, 'getTransporteurs']);
    Route::post('souscribe', [HomeController::class, 'souscribe']);

    Route::post('livreur/souscription', [LivreurController::class, 'souscribe']);
    Route::post('vehicule/souscription', [VehiculeController::class, 'souscribe']);
});

