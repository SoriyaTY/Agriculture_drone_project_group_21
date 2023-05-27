<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DroneController;
use App\Http\Controllers\DroneTypeController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\RoleUserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FarmController;
use App\Http\Controllers\InstructionController;
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


Route::middleware(['auth:sanctum'])->group(function () {

    Route::post('logout',[AuthenticationController::class,'logout']);

    Route::post('droneType', [DroneTypeController::class, 'store']);
    Route::post('plan', [PlanController::class, 'store']);

    Route::post('mapPhoto/{name}/{id}',[MapController::class,'postMapPhoto']);

    Route::delete('mapPhoto/{name}/{id}',[MapController::class,'deleteImage']);

    Route::put('/updateMap/{id}',   [MapController::class, 'update']);

    Route::put('drone/{id}',    [DroneController::class, 'update']);

    Route::put('drones/{id}',    [DroneController::class, 'updateInstrution']);//instruct with given plan

    Route::post('drone',        [DroneController::class, 'store']);

    Route::delete('drone/{id}', [DroneController::class, 'destroy']);

    Route::put('users/{id}',   [UserController::class, 'update']);

    Route::delete('users/{id}', [UserController::class, 'destroy']);

    Route::put('/updateLocation/{id}',   [LocationController::class, 'update']);

    Route::delete('/deleteLocation/{id}', [LocationController::class, 'destroy']);

    Route::post('/createLocation',       [LocationController::class, 'store']);

    Route::post('/createFram',       [FarmController::class, 'store']);

    Route::put('/updateFarm/{id}',   [FarmController::class, 'update']);

    Route::delete('/deleteFram/{id}', [FarmController::class, 'destroy']);

    Route::post('/createMap',       [MapController::class, 'store']);

    Route::put('/updateMap/{id}',   [MapController::class, 'update']);

    Route::delete('/deleteMap/{id}', [MapController::class, 'destroy']);
    
});



Route::post('login',[AuthenticationController::class,'login']);
Route::post('register',[AuthenticationController::class,'register']);

//user=============================
Route::get('users',        [UserController::class, 'index']);
Route::post('users',       [UserController::class, 'store']);
Route::get('users/{id}',   [UserController::class, 'show']);



//userrole===================
Route::post('roleUser',       [RoleUserController::class, 'store']);
Route::get('roleUser',        [RoleUserController::class, 'index']);
Route::get('roleUser/{id}',   [RoleUserController::class, 'show']);
Route::put('roleUser/{id}',   [RoleUserController::class, 'update']);
Route::delete('roleUser/{id}', [RoleUserController::class, 'destroy']);


//  Type of drone ========================================
Route::get('droneType', [DroneTypeController::class, 'index']);


// // Drone ======================================================
Route::get('drones/{id}',    [DroneController::class, 'show']);
Route::get('drones',         [DroneController::class, 'index']);


//plans=========================
Route::get('plans', [PlanController::class, 'index']);
Route::get('plan', [PlanController::class, 'show']);
Route::get('plans/{name}', [PlanController::class, 'index']);


// Location ======================================================
Route::get('/locations',             [LocationController::class, 'index']);
Route::get('/showLocation/{id}',     [LocationController::class, 'show']);



// Farm ==========================================================
Route::get('/farms',             [FarmController::class, 'index']);
Route::get('/showFram/{id}',     [FarmController::class, 'show']);



// Maps ==========================================================
Route::get('/maps', [MapController::class, 'index']);
Route::get('/showMap/{id}',     [MapController::class, 'show']);


// drone with current Location ================================================
Route::get('/drone/{id}/{location}', [DroneController::class, 'droneLocation']);


///instruction==============
Route::post('instruction',[InstructionController::class,'store']);
Route::get('instruction',[InstructionController::class,'index']);

//==========downloadmapphoto============
Route::get('mapPhoto/{name}/{id}',[MapController::class,'DownloadMapPhoto']);

//==============dronelocaton=============
Route::get('/drone/{id}/{location}', [DroneController::class, 'droneLocation']);
