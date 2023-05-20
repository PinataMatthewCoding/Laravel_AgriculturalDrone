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
    // DISPLAY A LISTING OF THER RESOURCE
    public function index()
    {
        $location =Location::all();
        $location=LocationResource::collection($location);
        return response()->json(["data"=>true, "location"=>$location],200);
    }

    // STORE A NEWLY CREATED RESOURCE IN STORAGE.
    public function store(LocationRequest $request)
    {
        $location =Location::store($request);
        return response()->json(["data"=>true, "location"=>$location],200);
    }

    // DISPLAY THE SPECIFIED RESOURCE.
    public function show(string $id)
    {
        $location =Location::find($id);
<<<<<<< HEAD
        if(!$location){
            return response()->json(["data"=>"not found id ".$id],404);
        }
        $location =new LocationShowResource($location);
        return response()->json(['success'=>true,'location'=>$location],200);
=======
        return response()->json(["data"=>true, "location"=>$location],200);
>>>>>>> a66d3e8d36cb72b0bf96b4fd8d12a48bbb7a2cd9
    }

    // UPDATE THE SPECIFIED RESOURCE IN STORAGE.
    public function update(LocationRequest $request, string $id)
    {
        $location =Location::store($request,$id);
        $location = new LocationShowResource($location);
        return response()->json(["data"=>true, "location"=>$location],200);
    }

    // REMOVE THE SPECIFIED RESOURCE FROM STORAGE.
    public function destroy(string $id)
    {
<<<<<<< HEAD
        //
        $location =Location::find($id);
        if(!$location){
            return response()->json(["data"=>"not found id " .$id],404);
        }
        $location->delete();
        return response()->json(['success'=>true,'location'=>"delete successfully"]);
=======
        $location =Location::find($id)->delete();
        return response()->json(["data"=>true, "location"=>"delete successfully"]);
>>>>>>> a66d3e8d36cb72b0bf96b4fd8d12a48bbb7a2cd9
    }
}