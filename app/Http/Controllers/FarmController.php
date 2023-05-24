<?php

namespace App\Http\Controllers;

use App\Http\Requests\FarmRequest;
use App\Http\Resources\FarmResource;
use App\Models\Farm;
use Illuminate\Http\Request;

class FarmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        
        $farm = Farm::all();
        $farm = FarmResource::collection($farm);
        return response()->json(["data"=>true ,"farms"=>$farm], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FarmRequest $request)
    {
        //
        $farm = Farm::store($request);
        return response()->json(["data"=>true ,"farms"=>$farm], 200);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $farm = Farm::find($id);
        if(!$farm){
            return response()->json(["maps"=>"not found id " .$id],404);
        }
        $farm = new FarmResource($farm);
        return response()->json(["data"=>true ,"farms"=>$farm], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FarmRequest $request, string $id)
    {
        //
        $farm = Farm::store($request,$id);
        return response()->json(["data"=>true ,"farms"=>$farm], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $farm = Farm::find($id);
        if(!$farm){
            return response()->json(["data"=>"not found id " .$id],404);
        }
        $farm->delete();
        return response()->json(["data"=>true ,"farms"=>"successfully"], 200);
    }
}
