<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\DroneController;
use App\Http\Controllers\FarmController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InstructionController;
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

// api route of location
Route::get('/locations',[LocationController::class,'index']);
Route::post('/location',[LocationController::class,'store']);
Route::get('/location/{id}',[LocationController::class,'show']);
Route::put('/location/{id}',[LocationController::class,'update']);
Route::delete('/location/{id}',[LocationController::class,'destroy']);

// api route of drones
Route::get("/drones", [DroneController::class, "index"]);
Route::post("/drones", [DroneController::class, "store"]);
Route::get("/drones/{id}", [DroneController::class, "show"]);
Route::put("/drones/{id}", [DroneController::class, "update"]);
Route::delete("/drones/{id}", [DroneController::class, "destroy"]);

// get drone by drone_id
Route::get("/drone/{id}", [DroneController::class, "showDroneByID"]);

// Show current latitude+longitude of drone droneId
Route::get("/currentDrone/{id}/location", [DroneController::class, "showCurrentDrone"]);

// api route of user 
Route::get("/users", [UserController::class, "index"]);
Route::post("/user", [UserController::class, "store"]);
Route::get("/user/{id}", [UserController::class, "show"]);
Route::put("/user/{id}", [UserController::class, "update"]);
Route::delete("/user/{id}", [UserController::class, "destroy"]);

// api route of plan
Route::get("/plans", [PlanController::class, "index"]);
Route::post("/plan", [PlanController::class, "store"]);
Route::get("/plan/{id}", [PlanController::class, "show"]);
Route::put("/plan/{id}", [PlanController::class, "update"]);
Route::delete("/plan/{id}", [PlanController::class, "destroy"]);

// show list image
Route::get("/mapImage", [MapController::class, "listImage"]);

// get plan name
Route::get("/plans/{name}", [PlanController::class, "showPlanName"]);

// API ROUTE OF MAPS
Route::get("/maps", [MapController::class, "index"]);
Route::post("/map", [MapController::class, "store"]);
Route::get("/map/{id}", [MapController::class, "show"]);
Route::put("/map/{id}", [MapController::class, "update"]);
Route::delete("/map/{id}", [MapController::class, "destroy"]);

// get map drone farm
Route::get("/maps/{name}/{id}", [MapController::class, "showDroneFarm"]);

// api route of farm
Route::get("/farms", [FarmController::class, "index"]);
Route::post("/farms", [FarmController::class, "store"]);
Route::get("/farms/{id}", [FarmController::class, "show"]);
Route::put("/farms/{id}", [FarmController::class, "update"]);
Route::delete("/farms/{id}", [FarmController::class, "destroy"]);

// api route of instruction
Route::get("/instructions", [InstructionController::class, "index"]);
Route::post("/instructions", [InstructionController::class, "store"]);
Route::get("/instructions/{id}", [InstructionController::class, "show"]);
Route::put("/instructions/{id}", [InstructionController::class, "update"]);
Route::delete("/instructions/{id}", [InstructionController::class, "destroy"]);