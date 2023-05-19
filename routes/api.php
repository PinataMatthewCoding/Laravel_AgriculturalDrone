<?php

<<<<<<< HEAD
use App\Http\Controllers\LocationController;
=======
use App\Http\Controllers\DroneController;
<<<<<<< HEAD
use App\Http\Controllers\MapController;
=======
>>>>>>> 9020ab2a486dd28dc1d016f6b0a37bb150e69a3a
>>>>>>> 288b5a8602d8862fc2382b264754687453bd7858
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

// Route location 
Route::get('/locations',[LocationController::class,'index']);
Route::post('/location',[LocationController::class,'store']);
Route::get('/location/{id}',[LocationController::class,'show']);
Route::put('/location/{id}',[LocationController::class,'update']);
Route::delete('/location/{id}',[LocationController::class,'destroy']);
=======
// API ROUTE OF DRONES
Route::get("/drones", [DroneController::class, "index"]);
Route::post("/drone", [DroneController::class, "store"]);
Route::get("/drone/{id}", [DroneController::class, "show"]);
Route::put("/drone/{id}", [DroneController::class, "update"]);
Route::delete("/drone/{id}", [DroneController::class, "destroy"]);
<<<<<<< HEAD
// API ROUTE OF MAPS
Route::get("/maps", [MapController::class, "index"]);
Route::post("/map", [MapController::class, "store"]);
Route::get("/map/{id}", [MapController::class, "show"]);
Route::put("/map/{id}", [MapController::class, "update"]);
Route::delete("/map/{id}", [MapController::class, "destroy"]);
=======
>>>>>>> 9020ab2a486dd28dc1d016f6b0a37bb150e69a3a
>>>>>>> 288b5a8602d8862fc2382b264754687453bd7858
