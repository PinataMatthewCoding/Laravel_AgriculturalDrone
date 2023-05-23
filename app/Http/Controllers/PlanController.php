<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlanRequest;
use App\Http\Resources\PlanResource;
use App\Http\Resources\PlanShowResource;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    // DISPLAY A LISTING OF THER RESOURCE
    public function index()
    {
        $plan = Plan::all();
        $plan = PlanResource::collection($plan);
        return response()->json(["data"=>true ,"plans"=>$plan], 200);
    }

    // STORE A NEWLY CREATED RESOURCE IN STORAGE.
    public function store(StorePlanRequest $request)
    {
        $plan = Plan::store($request);
        return response()->json(["data"=>true ,"plans"=>$plan], 200);
    }

    // DISPLAY THE SPECIFIED RESOURCE.
    public function show(string $id)
    {
        $plan = Plan::find($id);
        if(!$plan){
            return response()->json(["data"=>"not found id " .$id],404);
        }
        $plan = new PlanShowResource($plan);
        return response()->json(["data"=>true ,"plans"=>$plan], 200);
    }

    // UPDATE THE SPECIFIED RESOURCE IN STORAGE.
    public function update(StorePlanRequest $request, string $id)
    {
        $plan = Plan::store($request,$id);
        return response()->json(["data"=>true ,"plans"=>$plan], 200);
    }

    // REMOVE THE SPECIFIED RESOURCE FROM STORAGE.
    public function destroy(string $id)
    {
        $plan = Plan::find($id);
        if(!$plan){
            return response()->json(["data"=>"not found id ".$id],404);
        }
        $plan->delete();
        return response()->json(["data"=>true ,"plans"=>"delte successfully"], 200);
    }
}
