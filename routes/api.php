<?php

use App\Http\Controllers\DroneController;
use App\Http\Controllers\DroneTypeController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\RoleUserController;
use App\Http\Controllers\UserController;
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





Route::get('users',[UserController::class,'index']);
Route::post('users',[UserController::class,'store']);


Route::post('roleUser',[RoleUserController::class,'store']);
Route::get('roleUser',[RoleUserController::class,'index']);



//  Type of drone ========================================

Route::get('droneType',[DroneTypeController::class, 'index']);
Route::post('droneType',[DroneTypeController::class, 'store']);

// // Drone ======================================================
Route::get('drone',[DroneController::class, 'index']);
Route::post('drone',[DroneController::class, 'store']);

Route::get('plan',[PlanController::class,'index']);
Route::post('plan',[PlanController::class,'store']);
