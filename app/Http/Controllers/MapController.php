<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMapRequest;
use App\Http\Resources\ImageMapResource;
use App\Http\Resources\MapResource;
use App\Http\Resources\ShowMapResource;
use App\Models\Farm;
use App\Models\Image;
use App\Models\Map;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MapController extends Controller
{
    // DISPLAY A LISTING OF THER RESOURCE
    public function index()
    {
        $maps = Map::all();
        $maps = MapResource::collection($maps);
        return response()->json(["data"=>true ,"maps"=>$maps], 200);
    }
    // -------------show imageMap--------------------------
   

    public function store(StoreMapRequest $request)
    {
       $map = Map::store($request);
        return response()->json(["data"=>true, "map" =>$map],200);
    }


// ------------------show map by id---------------------------------------
    public function show(string $id)
    {
        $map = Map::find($id);
        if(!$map){
        return response()->json(["maps"=>"not found id " .$id],404);
        }
        $map = new ShowMapResource($map);
        return response()->json(["data"=>true, "maps" =>$map],200);
    }
// -----------------get map nameofprovince and farm id--------------------------

    public function showDroneFarm($name,$id){
        
        $name =Map::where('name', $name)->first();
        $farmID= Farm::where('id',$id)->first();
        if ($name) {
            if($farmID){
                return response()->json(['image' => $name->typeImage]);
            } 
            else {
                return response()->json(['message' => 'farm not found'], 404);
            }
        }    

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
}
