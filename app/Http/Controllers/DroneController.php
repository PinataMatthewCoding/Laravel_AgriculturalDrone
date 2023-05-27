<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreDroneRequest;
use App\Http\Resources\DroneResource;
use App\Http\Resources\ShowDroneResource;
use App\Models\Drone;
use App\Models\Instruction;
use App\Models\Plan;
use Illuminate\Http\Request;

class DroneController extends Controller
{
    // display a listing of ther resource.
    public function index()
    {
        $drones = Drone::all();
        $drones = DroneResource::collection($drones);
        return response()->json(["data"=>true ,"drones"=>$drones], 200);
    }

    // store a newly created resource in storage.
    public function store(StoreDroneRequest $request)
    {
        $drone = Drone::store($request);
        return response()->json(["success"=>true, "data" =>$drone],200);
    }

    // display the specified resource.
    public function show(string $id)
    {
        $drone =Drone::find($id);
        if(!$drone){
            return response()->json(["data"=>"not found id ".$id],404);
        }
        $drone = new ShowDroneResource($drone);
        return response()->json(['success'=>true,'drone'=>$drone],200);
    }

    // get drone by droneId (B23) 
    public function showDroneByID(string $id)
    {
        $drone = Drone::where('drone_id', $id)->first();
        if(!$drone){
            return response()->json(['success'=>true,'drone'=> "not found id" .$id ."doesn't exit"],200);
        }
        $drone = new ShowDroneResource($drone);
        return response()->json(['success'=>true,'drone'=>$drone],200);
    }

    
    // update location in drone  by drone_id
    public function droneupdate($drone_id){
        $drone = Drone::where('drone_id', $drone_id)->first();
        $instructions = $drone->instructions();
        $instructions->update([
            "brand" => request('brand'),
            "type" => request('type'),
            "is_action" => request('is_action'),
            "description" => request('description'),
            "instruction" => request('instruction')
        ]);
        return $instructions->get();
    }
    // =================== Show current latitude+longitude of drone D23===============

    public function showCurrentDrone(string $id)
    {

        $drone = Drone::where('drone_id', $id)->first();
        if ($drone) {
            return response()->json(['location' => $drone->location]);
        } else {
            return response()->json(['message' => 'Drone not found'], 404);
        }
    }

//  ===============update drone by dorne_id=======================
    public function update(string $id)
    {
        $drone = Drone::where('drone_id', $id)->first();
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

    




    
