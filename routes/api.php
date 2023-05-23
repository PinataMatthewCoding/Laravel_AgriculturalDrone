<?php

use App\Http\Controllers\LocationController;
use App\Http\Controllers\DroneController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\ProvinceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Monolog\Handler\RotatingFileHandler;

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

<<<<<<< HEAD
// API ROUTE OF LOCATION
Route::get('/locations',[LocationController::class,'index']);
Route::post('/location',[LocationController::class,'store']);
Route::get('/location/{id}',[LocationController::class,'show']);
Route::put('/location/{id}',[LocationController::class,'update']);
Route::delete('/location/{id}',[LocationController::class,'destroy']);
// Route location 
=======
// // API ROUTE OF LOCATION
>>>>>>> 85441491362ba6a50d900e12a7af222b7e35f840
Route::get("/locations", [LocationController::class, "index"]);
Route::post("/location", [LocationController::class, "store"]);
Route::get("/location/{id}", [LocationController::class, "show"]);
Route::put("/location/{id}", [LocationController::class, "update"]);
Route::delete("/location/{id}", [LocationController::class, "destroy"]);
// API ROUTE OF DRONES

Route::get("/drones", [DroneController::class, "index"]);
<<<<<<< HEAD
Route::post("/drones", [DroneController::class, "store"]);
Route::get("/drones/{id}", [DroneController::class, "show"]);
Route::put("/drones/{id}", [DroneController::class, "update"]);
Route::delete("/drones/{id}", [DroneController::class, "destroy"]);
=======
Route::post("/drone", [DroneController::class, "store"]);
Route::get("/drone/{id}", [DroneController::class, "show"]);
Route::put("/drone/{id}", [DroneController::class, "update"]);
Route::delete("/drone/{id}", [DroneController::class, "destroy"]);
>>>>>>> 85441491362ba6a50d900e12a7af222b7e35f840
// API ROUTE OF USER
Route::get("/users", [UserController::class, "index"]);
Route::post("/user", [UserController::class, "store"]);
Route::get("/user/{id}", [UserController::class, "show"]);
Route::put("/user/{id}", [UserController::class, "update"]);
Route::delete("/user/{id}", [UserController::class, "destroy"]);
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
// API ROUTE OF PROVINCE
Route::get("/provinces", [ProvinceController::class, "index"]);
Route::post("/province", [ProvinceController::class, "store"]);
Route::get("/province/{id}", [ProvinceController::class, "show"]);
Route::put("/province/{id}", [ProvinceController::class, "update"]);
Route::delete("/province/{id}", [ProvinceController::class, "destroy"]);
// API ROUTE OF IMAGE
Route::get("/images", [ImageController::class, "index"]);
Route::post("/image", [ImageController::class, "store"]);
Route::get("/image/{id}", [ImageController::class, "show"]);
Route::put("/image/{id}", [ImageController::class, "update"]);
Route::delete("/image/{id}", [ImageController::class, "destroy"]);
