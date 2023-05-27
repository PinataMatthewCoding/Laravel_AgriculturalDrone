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



// api route of drones
Route::get("/drones", [DroneController::class, "index"]);
Route::post("/drone", [DroneController::class, "store"]);
Route::get("/drone/{id}", [DroneController::class, "show"]);
Route::put("/drone/{id}", [DroneController::class, "update"]);
Route::delete("/drone/{id}", [DroneController::class, "destroy"]);

// get drone by drone_id
Route::get("/showdrone/{id}", [DroneController::class, "showDroneByID"]);

// Show current latitude+longitude of drone droneId
Route::get("/currentDrone/{id}/location", [DroneController::class, "showCurrentDrone"]);


// update drone
Route::put("/drones_update/{drone_id}", [DroneController::class, "droneupdate"]);

// API ROUTE OF USER

Route::get("/users", [UserController::class, "index"]);
Route::get("/user/{id}", [UserController::class, "show"]);
Route::put("/user/{id}", [UserController::class, "update"]);
Route::delete("/user/{id}", [UserController::class, "destroy"]);

// register
Route::post("/register", [AuthenticationController::class, "register"]);
// login
Route::post("/login", [AuthenticationController::class, "login"]);


Route::middleware('auth:sanctum')->group(function () {
    Route::post("/logout", [AuthenticationController::class, "logout"]);

    // api route of location
    Route::get('/locations',[LocationController::class,'index']);
    Route::post('/location',[LocationController::class,'store']);
    Route::get('/location/{id}',[LocationController::class,'show']);
    Route::put('/location/{id}',[LocationController::class,'update']);
    Route::delete('/location/{id}',[LocationController::class,'destroy']);

    // API ROUTE OF PLAN
    Route::get("/plans", [PlanController::class, "index"]);
    Route::post("/plan", [PlanController::class, "store"]);
    Route::get("/plan/{id}", [PlanController::class, "show"]);
    Route::put("/plan/{id}", [PlanController::class, "update"]);
    Route::delete("/plan/{id}", [PlanController::class, "destroy"]);


    // API ROUTE OF MAPS
    Route::get("/maps", [MapController::class, "index"]);
    Route::post("/map", [MapController::class, "store"]);
    Route::get("/map/{id}", [MapController::class, "show"]);
    Route::put("/map/{id}", [MapController::class, "update"]);
    Route::delete("/map/{id}", [MapController::class, "destroy"]);


    // API ROUTE OF FARM
    Route::get("/farms", [FarmController::class, "index"]);
    Route::post("/farm", [FarmController::class, "store"]);
    Route::get("/farm/{id}", [FarmController::class, "show"]);
    Route::put("/farm/{id}", [FarmController::class, "update"]);
    Route::delete("/farm/{id}", [FarmController::class, "destroy"]);

    // api route of instruction
    Route::get("/instructions", [InstructionController::class, "index"]);
    Route::post("/instructions", [InstructionController::class, "store"]);
    Route::get("/instructions/{id}", [InstructionController::class, "show"]);
    Route::put("/instructions/{id}", [InstructionController::class, "update"]);
    Route::delete("/instructions/{id}", [InstructionController::class, "destroy"]);
});






// show list image
Route::get("/mapImage", [MapController::class, "listImage"]);

// get plan name
Route::get("/plans/{name}", [PlanController::class, "showPlanName"]);

// get map drone farm
Route::get("/maps/{name}/{id}", [MapController::class, "showDroneFarm"]);


// delete image
Route::delete("/maps/{name}/{id}", [MapController::class, "deleteImage"]);

// add new image in map to farm
Route::put("/maps/{name}/{id}", [MapController::class, "storeNewImage"]);

// showListImage
Route::get("/mapImage", [MapController::class, "listImage"]);



