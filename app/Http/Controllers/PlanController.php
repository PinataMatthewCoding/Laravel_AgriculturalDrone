<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlanRequest;
use App\Http\Resources\PlanResource;
use App\Http\Resources\ShowPlanResource;
use App\Models\Instruction;
use App\Models\Map;
use App\Models\Plan;

class PlanController extends Controller
{
    // display a listing of ther resource.
    public function index()
    {
        $plan = Plan::all();
        $plan = PlanResource::collection($plan);
        return response()->json(["data"=>true ,"plans"=>$plan], 200);
    }

    // store a newly created resource in storage.
    public function store(StorePlanRequest $request)
    {
        $plan = Plan::store($request);
        return response()->json(["data"=>true ,"plans"=>$plan], 200);
    }

    // display the specified resource.
    public function show(string $id)
    {
        $plan = Plan::find($id);
        if(!$plan){
            return response()->json(["data"=>"not found id " .$id],404);
        }
        $plan = new ShowPlanResource($plan);
        return response()->json(["data"=>true ,"plans"=>$plan], 200);
    }

    // update the specified resource in storage.
    public function update(StorePlanRequest $request, string $id)
    {
        $plan = Plan::store($request,$id);
        return response()->json(["data"=>true ,"plans"=>$plan], 200);
    }

    // remove the specifide resource from storage
    public function destroy(string $id)
    {
        $plan = Plan::find($id);
        if(!$plan){
            return response()->json(["data"=>"not found id ".$id],404);
        }
        $plan->delete();
        return response()->json(["data"=>true ,"plans"=>"delte successfully"], 200);
    }


    // ------------show plan name -----------------------
    public function showPlanName(string $name)
    {
        $plans = Plan::where('name', $name)->with('instructions')->first();
        if($plans){
            return response()->json(["data"=>true ,"plans"=>$plans], 200);
        }
        else{
            return response()->json(["data"=>true ,"plans"=>"not found " . $name], 404);;
        }
    }
}