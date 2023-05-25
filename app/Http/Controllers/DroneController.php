<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreDroneRequest;
use App\Http\Resources\DroneResource;
use App\Http\Resources\ShowDroneResource;
use App\Models\Drone;
use App\Models\Plan;
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
    //================ show drone by id =====================
    public function show(string $id)
    {
        $drone =Drone::find($id);
        if(!$drone){
            return response()->json(["data"=>"not found id ".$id],404);
        }
        $drone = new ShowDroneResource($drone);
        return response()->json(['success'=>true,'drone'=>$drone],200);
    }

    //================= get drone by droneId =================
    public function showDroneByID(string $id)
    {
        $drone = Drone::where('drone_id', $id)->first();
        $drone = new ShowDroneResource($drone);
        return response()->json(['success'=>true,'drone'=>$drone],200);
    }


    
    // =================== Show current latitude+longitude of drone D23===============
        public function showCurrentDrone(Request $request){
        $id = $request->route('id');

        $drone = Drone::where('drone_id', $id)->first();
        if ($drone) {
            return response()->json(['location' => $drone->location]);
        } else {
            return response()->json(['message' => 'Drone not found'], 404);
        }
    }




    // UPDATE THE SPECIFIED RESOURCE IN STORAGE.
    public function update(StoreDroneRequest $request, string $id)
    {
        // dd(0);
        $drone = Drone::store($request, $id);
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