<?php

use App\Http\Controllers\DroneController;
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
// API ROUTE OF DRONES
Route::get("/drones", [DroneController::class, "index"]);
Route::post("/drone", [DroneController::class, "store"]);
Route::get("/drone/{id}", [DroneController::class, "show"]);
Route::put("/drone/{id}", [DroneController::class, "update"]);
Route::delete("/drone/{id}", [DroneController::class, "destroy"]);
