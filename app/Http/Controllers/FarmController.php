<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFarmRequest;
use App\Http\Resources\FarmResource;
use App\Models\Farm;

class FarmController extends Controller
{
    // DISPLAY A LISTING OF THER RESOURCE
    public function index()
    {
        $farm = Farm::all();
        $farm = FarmResource::collection($farm);
        return response()->json(["data"=>true ,"farms"=>$farm], 200);
    }

    // STORE A NEWLY CREATED RESOURCE IN STORAGE.
    public function store(StoreFarmRequest $request)
    {
        $farm = Farm::store($request);
        return response()->json(["data"=>true ,"farms"=>$farm], 200);

    }

    // DISPLAY THE SPECIFIED RESOURCE.
    public function show(string $id)
    {
        $farm = Farm::find($id);
        if(!$farm){
            return response()->json(["maps"=>"not found id " .$id],404);
        }
        $farm = new FarmResource($farm);
        return response()->json(["data"=>true ,"farms"=>$farm], 200);
    }

    // UPDATE THE SPECIFIED RESOURCE IN STORAGE.
    public function update(StoreFarmRequest $request, string $id)
    {
        $farm = Farm::store($request,$id);
        return response()->json(["data"=>true ,"farms"=>$farm], 200);
    }

    // REMOVE THE SPECIFIED RESOURCE FROM STORAGE.
    public function destroy(string $id)
    {
        $farm = Farm::find($id);
        if(!$farm){
            return response()->json(["data"=>"not found id " .$id],404);
        }
        $farm->delete();
        return response()->json(["data"=>true ,"farms"=>"successfully"], 200);
    }
}