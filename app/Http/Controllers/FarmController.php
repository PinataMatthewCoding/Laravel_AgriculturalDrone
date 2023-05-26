<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFarmRequest;
use App\Http\Resources\FarmResource;
use App\Models\Farm;

class FarmController extends Controller
{
    // display a listing of ther resource.
    public function index()
    {
        $farm = Farm::all();
        $farm = FarmResource::collection($farm);
        return response()->json(["data"=>true ,"farms"=>$farm], 200);
    }

    // store a newly created resource in storage.
    public function store(StoreFarmRequest $request)
    {
        $farm = Farm::store($request);
        return response()->json(["data"=>true ,"farms"=>$farm], 200);

    }

    // display the specified resource.
    public function show(string $id)
    {
        $farm = Farm::find($id);
        if(!$farm){
            return response()->json(["maps"=>"not found id " .$id],404);
        }
        $farm = new FarmResource($farm);
        return response()->json(["data"=>true ,"farms"=>$farm], 200);
    }

    // update the specified resource in storage.
    public function update(StoreFarmRequest $request, string $id)
    {
        $farm = Farm::store($request,$id);
        return response()->json(["data"=>true ,"farms"=>$farm], 200);
    }

    // remove the specifide resource from storage
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