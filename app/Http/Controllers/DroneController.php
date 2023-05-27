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
        $drone = new ShowDroneResource($drone);
        return response()->json(['success'=>true,'drone'=>$drone],200);
    }

<<<<<<< HEAD
    // Show current latitude+longitude of drone D23
=======

    
    // update drone by id
    public function droneupdate($drone_id){
        $drone = Drone::where('drone_id', $drone_id)->first();
        $instructions = $drone->instructions();
    
        $instructions->update([
            "band" => request('band'),
            "type" => request('type'),
            "is_action" => request('is_action'),
            "description" => request('description'),
            "instruction" => request('instruction')
        ]);
    
        return $instructions->get();
    }

    // ============ Show current latitude+longitude of drone D23===============


    
    // =================== Show current latitude+longitude of drone D23===============

>>>>>>> be5c5059756b77d09aa35277a84595feee92e96b
        public function showCurrentDrone(Request $request){
        $id = $request->route('id');

        $drone = Drone::where('drone_id', $id)->first();
        if ($drone) {
            return response()->json(['location' => $drone->location]);
        } else {
            return response()->json(['message' => 'Drone not found'], 404);
        }
    }

<<<<<<< HEAD
    // update the specified resource in storage.
=======




    // UPDATE THE SPECIFIED RESOURCE IN STORAGE.

>>>>>>> be5c5059756b77d09aa35277a84595feee92e96b
    public function update(StoreDroneRequest $request, string $id)
    {
        $drone = Drone::store($request, $id);
        return response()->json(["data"=>true, "drone" =>$drone],200);
    }

<<<<<<< HEAD
    // remove the specifide resource from storage
=======

    // REMOVE THE SPECIFIED RESOURCE FROM STORAGE.

>>>>>>> be5c5059756b77d09aa35277a84595feee92e96b
    public function destroy(string $id)
    {
        $drone = Drone::find($id);
        if(!$drone){
            return response()->json(["data"=>"not found id ".$id],404);
        }
        $drone->delete();
        return response()->json(["data"=>true ,"drone"=>"delete successfully"], 201);
    }
<<<<<<< HEAD
}
=======

    
}



    
>>>>>>> be5c5059756b77d09aa35277a84595feee92e96b
