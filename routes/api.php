<?php

use App\Http\Controllers\DroneController;
use App\Http\Controllers\DroneTypeController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\RoleUserController;
use App\Http\Controllers\UserController;
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




//user=============================
Route::get('users',        [UserController::class, 'index']);
Route::post('users',       [UserController::class, 'store']);
Route::get('users/{id}',   [UserController::class, 'show']);
Route::put('users/{id}',   [UserController::class, 'update']);
Route::delete('users/{id}', [UserController::class, 'destroy']);

//userrole===================
Route::post('roleUser',       [RoleUserController::class, 'store']);
Route::get('roleUser',        [RoleUserController::class, 'index']);
Route::get('roleUser/{id}',   [RoleUserController::class, 'show']);
Route::put('roleUser/{id}',   [RoleUserController::class, 'update']);
Route::delete('roleUser/{id}', [RoleUserController::class, 'destroy']);


//  Type of drone ========================================

Route::get('droneType', [DroneTypeController::class, 'index']);
Route::post('droneType', [DroneTypeController::class, 'store']);

// // Drone ======================================================
Route::get('drone', [DroneController::class, 'index']);
Route::post('drone', [DroneController::class, 'store']);

//plans=========================
Route::get('plan', [PlanController::class, 'index']);
Route::post('plan', [PlanController::class, 'store']);

// Location ======================================================
Route::get('/locations',             [LocationController::class, 'index']);
Route::post('/createLocation',       [LocationController::class, 'store']);
Route::get('/showLocation/{id}',     [LocationController::class, 'show']);
Route::put('/updateLocation/{id}',   [LocationController::class, 'update']);
Route::delete('/deleteLocation/{id}', [LocationController::class, 'destroy']);

// Farm ==========================================================
Route::get('/farms',             [FarmController::class, 'index']);
Route::post('/createFram',       [FarmController::class, 'store']);
Route::get('/showFram/{id}',     [FarmController::class, 'show']);
Route::put('/updateFarm/{id}',   [FarmController::class, 'update']);
Route::delete('/deleteFram/{id}', [FarmController::class, 'destroy']);

// Maps ==========================================================
Route::get('/maps',             [MapController::class, 'index']);
Route::post('/createMap',       [MapController::class, 'store']);
Route::get('/showMap/{id}',     [MapController::class, 'show']);
Route::put('/updateMap/{id}',   [MapController::class, 'update']);
Route::delete('/deleteMap/{id}', [MapController::class, 'destroy']);


///Requiment
Route::get('drones', [DroneController::class, 'index']);
