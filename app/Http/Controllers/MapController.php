<?php

namespace App\Http\Controllers;

use App\Http\Resources\ShowMapResource;
use App\Models\Map;
use Illuminate\Http\Request;

class MapController extends Controller
{
    // DISPLAY A LISTING OF THER RESOURCE
    public function index()
    {
        $maps = Map::all();
        return response()->json(["data"=>true ,"maps"=>$maps], 200);
    }

    // STORE A NEWLY CREATED RESOURCE IN STORAGE.
    public function store(Request $request)
    {
       $map = Map::store($request);
        return response()->json(["data"=>true, "map" =>$map],200);
    }

    // DISPLAY THE SPECIFIED RESOURCE.
    public function show(string $id)
    {
       $map = Map::find($id);
       $map = new ShowMapResource($map);
        if(!$map){
            return response()->json(["maps"=>"not found",404]);
        }
        return response()->json(["data"=>true, "maps" =>$map],200);
    }

    // UPDATE THE SPECIFIED RESOURCE IN STORAGE.
    public function update(Request $request, string $id)
    {
       $map = Map::store($request,$id);
        return response()->json(["data"=>true, "maps" =>$map],200);
    }

    // REMOVE THE SPECIFIED RESOURCE FROM STORAGE.
    public function destroy(string $id)
    {
       $map = Map::find($id)->delete();
        return response()->json(["data"=>true ,"map"=>"delete successfully"], 201);
    }
}
