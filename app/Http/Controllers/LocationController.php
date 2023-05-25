<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreLocationmRequest;
use App\Http\Resources\LocationResource;
use App\Http\Resources\ShowLocationResource;
use App\Models\Location;

class LocationController extends Controller
{
    // DISPLAY A LISTING OF THER RESOURCE
    public function index()
    {
        $location =Location::all();
        $location=LocationResource::collection($location);
        return response()->json(["data"=>true, "location"=>$location],200);
    }

    // STORE A NEWLY CREATED RESOURCE IN STORAGE.
    public function store(StoreLocationmRequest $request)
    {
        $location =Location::store($request);
        return response()->json(["data"=>true, "location"=>$location],200);
    }

    // DISPLAY THE SPECIFIED RESOURCE.
    public function show(string $id)
    {
        $location =Location::find($id);
        if(!$location){
            return response()->json(["data"=>"not found id ".$id],404);
        }
        $location = new ShowLocationResource($location);
        return response()->json(['success'=>true,'location'=>$location],200);
    }

    // UPDATE THE SPECIFIED RESOURCE IN STORAGE.
    public function update(StoreLocationmRequest $request, string $id)
    {
        $location = Location::store($request,$id);
        return response()->json(["data"=>true, "location"=>$location],200);
    }

    // REMOVE THE SPECIFIED RESOURCE FROM STORAGE.
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