<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreLocationmRequest;
use App\Http\Resources\LocationResource;
use App\Http\Resources\ShowLocationResource;
use App\Models\Location;

class LocationController extends Controller
{
    // display a listing of ther resource.
    public function index()
    {
        $location =Location::all();
        $location=LocationResource::collection($location);
        return response()->json(["data"=>true, "location"=>$location],200);
    }

    // store a newly created resource in storage.
    public function store(StoreLocationmRequest $request)
    {
        $location =Location::store($request);
        return response()->json(["data"=>true, "location"=>$location],200);
    }

    // display the specified resource.
    public function show(string $id)
    {
        $location =Location::find($id);
        if(!$location){
            return response()->json(["data"=>"not found id ".$id],404);
        }
        $location = new ShowLocationResource($location);
        return response()->json(['success'=>true,'location'=>$location],200);
    }

    // update the specified resource in storage.
    public function update(StoreLocationmRequest $request, string $id)
    {
        $location = Location::store($request,$id);
        return response()->json(["data"=>true, "location"=>$location],200);
    }

    // remove the specifide resource from storage
    public function destroy(string $id)
    {
        $location =Location::find($id);
        if(!$location){
            return response()->json(["data"=>"not found id " .$id],404);
        }
        $location->delete();
        return response()->json(['success'=>true,'location'=>"delete successfully"]);
    }
}