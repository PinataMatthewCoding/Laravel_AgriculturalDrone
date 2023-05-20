<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDroneRequest;
use App\Http\Resources\DroneResource;
use App\Http\Resources\ShowDroneResource;
use App\Models\Drone;
use Illuminate\Http\Request;

class DroneController extends Controller
{
    // DISPLAY A LISTING OF THER RESOURCE
    public function index()
    {
        $drones = Drone::all();
        $drones = DroneResource::collection($drones);
        return response()->json(["data"=>true ,"drones"=>$drones], 200);
    }

    // STORE A NEWLY CREATED RESOURCE IN STORAGE.
    public function store(Request $request)
    {
        $drone = Drone::store($request);
        return response()->json(["success"=>true, "data" =>$drone],200);
    }

    // DISPLAY THE SPECIFIED RESOURCE.
    public function show(string $id)
    {
        $drone = Drone::find($id);
<<<<<<< HEAD
        
        if(!$drone){
            return response()->json(["data"=>"not found id ".$id],404);
=======
        if(!$drone){
            return response()->json(["drone"=>"not found"]);
>>>>>>> a66d3e8d36cb72b0bf96b4fd8d12a48bbb7a2cd9
        }
        $drone = new ShowDroneResource($drone);
        return response()->json(["data"=>true, "drone" =>$drone],200);
    }

    // UPDATE THE SPECIFIED RESOURCE IN STORAGE.
    public function update(StoreDroneRequest $request, string $id)
    {
        $drone = Drone::store($request,$id);
        return response()->json(["data"=>true, "drone" =>$drone],200);
    }

    // REMOVE THE SPECIFIED RESOURCE FROM STORAGE.
    public function destroy(string $id)
    {
        $drone = Drone::find($id);
        if(!$drone){
            return response()->json(["data"=>"not found id ".$id],404);
        }
        $drone->delete();
        return response()->json(["data"=>true ,"drone"=>"delete successfully"], 201);
    }
}