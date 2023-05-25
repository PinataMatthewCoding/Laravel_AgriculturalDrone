<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMapRequest;
use App\Http\Resources\MapResource;
use App\Http\Resources\ShowMapResource;
use App\Models\Farm;
use App\Models\Map;


class MapController extends Controller
{
    // display a listing of ther resource.
    public function index()
    {
        $maps = Map::all();
        $maps = MapResource::collection($maps);
        return response()->json(["data"=>true ,"maps"=>$maps], 200);
    }

    // store a newly created resource in storage.
    public function store(StoreMapRequest $request)
    {
       $map = Map::store($request);
        return response()->json(["data"=>true, "map" =>$map],200);
    }

    // display the specified resource.
    public function show(string $id)
    {
        $map = Map::find($id);
        if(!$map){
            return response()->json(["maps"=>"not found id " .$id],404);
        }
        $map = new ShowMapResource($map);
        return response()->json(["data"=>true, "maps" =>$map],200);
    }

    // ======= get image in map when (put name map and id of farm) ==========
    public function showDroneFarm($name,$id){
        $name = Map::where('name', $name)->first();
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

    // update the specified resource in storage.
    public function update(StoreMapRequest $request, string $id)
    {
       $map = Map::store($request,$id);
        return response()->json(["data"=>true, "maps" =>$map],200);
    }

    // remove the specifide resource from storage
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