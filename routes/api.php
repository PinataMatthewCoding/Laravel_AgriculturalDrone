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



Route::middleware('auth:sanctum')->group(function () {
    Route::post("/logout", [AuthenticationController::class, "logout"]);

    //===============api route of location=================
    Route::post('/location',[LocationController::class,'store']);
    Route::put('/location/{id}',[LocationController::class,'update']);
    Route::delete('/location/{id}',[LocationController::class,'destroy']);

    //=============== API ROUTE OF PLAN==================
    Route::post("/plan", [PlanController::class, "store"]);
    Route::put("/plan/{id}", [PlanController::class, "update"]);
    Route::delete("/plan/{id}", [PlanController::class, "destroy"]);
    // -------------------user story---------------
    // =======get plan name=======
    Route::get("/plans/{name}", [PlanController::class, "showPlanName"]);


    //======================== API ROUTE OF MAPS================
    Route::post("/map", [MapController::class, "store"]);
    Route::put("/map/{id}", [MapController::class, "update"]);
    Route::delete("/map/{id}", [MapController::class, "destroy"]);

    // -----------------user story--------------------------

    //=========== get name province and farm in map================
    Route::get("/maps/{name}/{id}", [MapController::class, "showDroneFarm"]);

    // ==========delete image in map ============
    Route::delete("/maps/{name}/{id}", [MapController::class, "deleteImage"]);

    // ==========add new image in map to farm========
    Route::put("/maps/{name}/{id}", [MapController::class, "updateNewImage"]);

    // ==========show list image================
    Route::get("/mapImage", [MapController::class, "listImage"]);

    //=============== API ROUTE OF FARM===========
    Route::post("/farm", [FarmController::class, "store"]);
    Route::put("/farm/{id}", [FarmController::class, "update"]);
    Route::delete("/farm/{id}", [FarmController::class, "destroy"]);

    //============== api route of drones=================
    Route::post("/drone", [DroneController::class, "store"]);
    Route::put("/drone/{id}", [DroneController::class, "update"]);
    Route::delete("/drone/{id}", [DroneController::class, "destroy"]);
    // -----------------------user story--------------------------
    //==========get drone by drone_id=========
    Route::get("/showdrone/{id}", [DroneController::class, "showDroneByID"]);

    // ==========Show current latitude+longitude of drone droneId==========
    Route::get("/currentDrone/{id}/location", [DroneController::class, "showCurrentDrone"]);

    //========= update drone by drone_id ===========
    Route::put("/drones_update/{drone_id}", [DroneController::class, "droneupdate"]);

    //==========api route of instruction=========
    Route::post("/instructions", [InstructionController::class, "store"]);
    Route::put("/instructions/{id}", [InstructionController::class, "update"]);
    Route::delete("/instructions/{id}", [InstructionController::class, "destroy"]);
});


// API ROUTE OF USER
Route::get("/users", [UserController::class, "index"]);
Route::get("/user/{id}", [UserController::class, "show"]);


// register
Route::post("/register", [AuthenticationController::class, "register"]);
// login
Route::post("/login", [AuthenticationController::class, "login"]);

// ===============api route of location===================
Route::get('/locations',[LocationController::class,'index']);
Route::get('/location/{id}',[LocationController::class,'show']);

//===================== API ROUTE OF PLAN===============
Route::get("/plans", [PlanController::class, "index"]);
Route::get("/plan/{id}", [PlanController::class, "show"]);

//==================== API ROUTE OF MAPS===================
Route::get("/maps", [MapController::class, "index"]);
Route::get("/map/{id}", [MapController::class, "show"]);

//==================== API ROUTE OF FARM=================
Route::get("/farms", [FarmController::class, "index"]);
Route::get("/farm/{id}", [FarmController::class, "show"]);


//================ api route of drones=====================
Route::get("/drones", [DroneController::class, "index"]);
Route::get("/drone/{id}", [DroneController::class, "show"]);

//=============== api route of instruction=================
Route::get("/instructions", [InstructionController::class, "index"]);
Route::get("/instructions/{id}", [InstructionController::class, "show"]);

