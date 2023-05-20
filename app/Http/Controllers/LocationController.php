<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocationRequest;
use App\Http\Resources\LocationResource;
use App\Http\Resources\LocationShowResource;
use App\Models\Location;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $location =Location::all();
        $location=LocationResource::collection($location);
        return response()->json(['success'=>true,'location'=>$location],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LocationRequest $request)
    {
        //
        $location =Location::store($request);
        return response()->json(['success'=>true,'location'=>$location],200);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $location =Location::find($id);
        if(!$location){
            return response()->json(["data"=>"not found id ".$id],404);
        }
        $location =new LocationShowResource($location);
        return response()->json(['success'=>true,'location'=>$location],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LocationRequest $request, string $id)
    {
        //
        $location =Location::store($request,$id);
        $location = new LocationShowResource($location);
        return response()->json(['success'=>true,'location'=>$location],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $location =Location::find($id);
        if(!$location){
            return response()->json(["data"=>"not found id " .$id],404);
        }
        $location->delete();
        return response()->json(['success'=>true,'location'=>"delete successfully"]);
    }
}
