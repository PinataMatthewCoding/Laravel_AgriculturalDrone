<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlanRequest;
use App\Http\Resources\PlanResource;
use App\Http\Resources\PlanShowResource;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $plan = Plan::all();
        $plan = PlanResource::collection($plan);
        return response()->json(["data"=>true ,"plans"=>$plan], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlanRequest $request)
    {
        //
        $plan = Plan::store($request);
        return response()->json(["data"=>true ,"plans"=>$plan], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $plan = Plan::find($id);
        if(!$plan){
            return response()->json(["data"=>"not found id " .$id],404);
        }
        $plan = new PlanShowResource($plan);
        return response()->json(["data"=>true ,"plans"=>$plan], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePlanRequest $request, string $id)
    {
        //
        $plan = Plan::store($request,$id);
        return response()->json(["data"=>true ,"plans"=>$plan], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $plan = Plan::find($id);
        if(!$plan){
            return response()->json(["data"=>"not found id ".$id],404);
        }
        $plan->delete();
        return response()->json(["data"=>true ,"plans"=>"delte successfully"], 200);
    }
}
