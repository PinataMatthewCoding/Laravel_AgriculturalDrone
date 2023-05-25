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

<<<<<<< HEAD
    // store a newly created resource in storage.
=======
   
   


    // STORE A NEWLY CREATED RESOURCE IN STORAGE.

>>>>>>> d4cc04933bb0e89c22aad08144f33b94fb7a8df8
    public function store(StoreMapRequest $request)
    {
       $map = Map::store($request);
        return response()->json(["data"=>true, "map" =>$map],200);
    }
// -----------------create new image in map to farm---------------------------
    public function storeNewImage($name,$id){
        $farm = Farm::where('id',$id)->first();
        if($farm){
            $map = Map::where('name',$name)->first();
            $map->typeImage->add([
                'typeImage' => request('typeImage')
            ]);
            return $map;
        }
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

<<<<<<< HEAD
    // ======= get image in map when (put name map and id of farm) ==========
=======

    // ============== get map nameofprovince and farm id ===============
>>>>>>> d4cc04933bb0e89c22aad08144f33b94fb7a8df8
    public function showDroneFarm($name,$id){
        $name = Map::where('name', $name)->first();

        $farmID= Farm::where('id',$id)->first();
        if ($farmID) {
            $name =Map::where('name', $name)->first();
            if($name){
                return response()->json(['image' => $name->typeImage]);
            } 
        }    

        else {
            return response()->json(['message' => 'image not found'], 404);
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
<<<<<<< HEAD
}
=======

    // -------------------------delete only image in map-----------------------------
    public function deleteImage($name, $id)
    {
        $farm = Farm::where('id', $id)->first();
        if ($farm) {
            $map =Map::where('name', $name)->first();
            if($map->typeImage){
                return response()->json(['message'=>'delete success','data'=>$map->delete()]) ;   
            }
            
        }
    }
}
>>>>>>> d4cc04933bb0e89c22aad08144f33b94fb7a8df8
