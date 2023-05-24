<?php

use App\Http\Controllers\DroneController;
use App\Http\Controllers\DroneTypeController;
use App\Http\Controllers\FarmController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MapController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//  Type of drone ========================================
Route::get('/type',             [DroneTypeController::class, 'index'  ]);
Route::post('/typePost',        [DroneTypeController::class, 'store'  ]);
Route::get('/typeShow',         [DroneTypeController::class, 'show'   ]);
Route::put('/typeUpdate',       [DroneTypeController::class, 'update' ]);
Route::delete('/typeDelete',    [DroneTypeController::class, 'destroy']);

// Drone ======================================================
Route::get('/drone',            [DroneController::class, 'index'  ]);
Route::post('/dronePost',       [DroneController::class, 'store'  ]);
Route::get('/droneShow',        [DroneController::class, 'show'   ]);
Route::put('/droneUpdate',      [DroneController::class, 'update' ]);
Route::delete('/droneDelete',   [DroneController::class, 'destroy']);

// Location ======================================================
Route::get('/locations',             [LocationController::class, 'index'  ]);
Route::post('/createLocation',       [LocationController::class, 'store'  ]);
Route::get('/showLocation/{id}',     [LocationController::class, 'show'   ]);
Route::put('/updateLocation/{id}',   [LocationController::class, 'update' ]);
Route::delete('/deleteLocation/{id}',[LocationController::class, 'destroy']);

// Farm ==========================================================
Route::get('/farms',             [FarmController::class, 'index'  ]);
Route::post('/createFram',       [FarmController::class, 'store'  ]);
Route::get('/showFram/{id}',     [FarmController::class, 'show'   ]);
Route::put('/updateFarm/{id}',   [FarmController::class, 'update' ]);
Route::delete('/deleteFram/{id}',[FarmController::class, 'destroy']);

// Maps ==========================================================
Route::get('/maps',             [MapController::class, 'index'  ]);
Route::post('/createMap',       [MapController::class, 'store'  ]);
Route::get('/showMap/{id}',     [MapController::class, 'show'   ]);
Route::put('/updateMap/{id}',   [MapController::class, 'update' ]);
Route::delete('/deleteMap/{id}',[MapController::class, 'destroy']);


