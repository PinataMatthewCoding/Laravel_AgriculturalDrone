<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMapRequest;
use App\Http\Resources\MapImageResource;
use App\Http\Resources\MapResource;
use App\Http\Resources\ShowMapResource;
use App\Models\Farm;
use App\Models\Map;
use GuzzleHttp\Psr7\Request;

use function PHPSTORM_META\map;

class MapController extends Controller
{
    // DISPLAY A LISTING OF THER RESOURCE
    public function index()
    {
        $maps = Map::all();
        $maps = MapResource::collection($maps);
        return response()->json(["data"=>true ,"maps"=>$maps], 200);
    }

 // -------------------------show list image--------------------
    public function listImage() {
        $maps = Map::all();
        $maps = MapImageResource::collection($maps);
        return response()->json(["data"=>true ,"maps"=>$maps], 200);
    }
    
    // STORE A NEWLY CREATED RESOURCE IN STORAGE.


    public function store(StoreMapRequest $request)
    {
       $map = Map::store($request);
        return response()->json(["data"=>true, "map" =>$map],200);
    }    
// -----------------update new image in map to farm---------------------------
    public function updateNewImage(string $name, string $farm_id)
    {
        $map = Map::where('name', $name)->first();
        if (!isset($map)) {
            return response()->json(['success' => false, 'message' => "map id: " . $name . " doesn't exsit" ], 401);
        }
        $farms = Farm::where('id', $farm_id)->first();
        if (empty($farms)) {
            return response()->json(['success' => false, 'message' => "farm id: " . $farm_id . " doesn't exsit"], 401);
        }
        if ($map) {
            $map->update([
                "typeImage"=>request('typeImage'),
        ]);
            return response()->json(['success' => true, 'data' => $map], 201);
        } 
    }
    // DISPLAY THE SPECIFIED RESOURCE.
    public function show(string $id)
    {
        $map = Map::find($id);
        if(!$map){
            return response()->json(["maps"=>"not found id " .$id],404);
        }
        $map = new ShowMapResource($map);
        return response()->json(["data"=>true, "maps" =>$map],200);
    }
    // ============== get map nameofprovince and farm id ===============
    public function showDroneFarm(string $name, string $farm_id)
    {
        $map = Map::where('name', $name)->first();
        if (!isset($map)) {
            return response()->json(['success' => false, 'message' => $name ], 401);
        }
        $farms = Farm::where('id', $farm_id)->first();
        if (empty($farms)) {
            return response()->json(['success' => false, 'message' => "farm id: " . $farm_id . " doesn't exsit"], 401);
        }
        return response()->json(['success' => true, 'message' => 'Request farm successfully', 'data' =>$map->typeImage], 200);

    }

    // UPDATE THE SPECIFIED RESOURCE IN STORAGE.
    public function update(StoreMapRequest $request, string $id)
    {
       $map = Map::store($request,$id);
        return response()->json(["data"=>true, "maps" =>$map],200);
    }

    // REMOVE THE SPECIFIED RESOURCE FROM STORAGE.
    public function destroy(string $id)
    {
        $map = Map::find($id);
        if(!$map){
            return response()->json(["data"=> false,"map"=>"not found id " .$id],404);
        }
        $map->delete();
        return response()->json(["data"=>true ,"map"=>"delete successfully"], 201);
    }

    // -------------------------delete only image in map-----------------------------
    
    public function deleteImage(string $name, string $farm_id){
        $map = Map::where('name', $name)->first();
         if (!isset($map)) {
            return response()->json(['success' => false, 'message' => " name: " . $name . " doesn't exsit"], 401);
        }
        $farms = Farm::where('id', $farm_id)->first();
        if (empty($farms)) {
            return response()->json(['success' => false, 'message' => "farm id: " . $farm_id . " doesn't exsit"], 401);
        }
        if($map->typeImage){
            $map->typeImage = "null";
            $map->save();
            return response()->json(['success' => true, 'message' => 'Maps has been deleted successfully' ], 200);
        }
    }
}

    





    




