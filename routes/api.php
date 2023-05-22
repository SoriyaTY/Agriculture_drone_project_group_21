<?php

use App\Http\Controllers\DroneController;
use App\Http\Controllers\DroneTypeController;
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

Route::get('/type',[DroneTypeController::class, 'index']);
Route::post('/typePost',[DroneTypeController::class, 'store']);
Route::get('/typeShow',[DroneTypeController::class, 'show']);
Route::put('/typeUpdate',[DroneTypeController::class, 'update']);
Route::delete('/typeDelete',[DroneTypeController::class, 'destroy']);






// Drone ======================================================

Route::get('/drone',[DroneController::class, 'index']);
Route::post('/dronePost',[DroneController::class, 'store']);
Route::get('/droneShow',[DroneController::class, 'show']);
Route::put('/droneUpdate',[DroneController::class, 'update']);
Route::delete('/droneDelete',[DroneController::class, 'destroy']);