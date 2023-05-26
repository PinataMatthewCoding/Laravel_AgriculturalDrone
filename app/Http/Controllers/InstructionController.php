<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreInstructionRequest;
use App\Http\Resources\InstructionResource;
use App\Http\Resources\ShowInstructionResource;
use App\Models\Instruction;
class InstructionController extends Controller
{
    // display a listing of ther resource.
    public function index()
    {
        $instructions = Instruction::all();
        $instructions = InstructionResource::collection($instructions);
        return response()->json(["data"=>true, "instruction"=>$instructions], 200);
    }

    // store a newly created resource in storage.
    public function store (StoreInstructionRequest $request)
    {
        $instructions = Instruction::store($request);
        return response()->json(["data"=>true, "instruction"=>$instructions],200);
    }

    // display the specified resource.
    public function show(string $id)
    {
        $instructions = Instruction::find($id);
        if(!$instructions){
            return response()->json(["instruction"=>"not found id"." " .$id],404);
        }
        $instructions = new ShowInstructionResource($instructions);
        return response()->json(["data"=>true, "instruction"=>$instructions],200);
    }

    // update the specified resource in storage.
    public function update(StoreInstructionRequest $request, string $id)
    {
        $instructions = Instruction::store($request,$id);
        return response()->json(["data"=>true, "instruction"=>$instructions],200);
    }

    // remove the specifide resource from storage
    public function destroy(string $id)
    {
        $instructions = Instruction::find($id);
        if(!$instructions){
            return response()->json(["data"=>false, "instruction"=>"not found id"." " .$id],404);
        }
        $instructions->delete();
        return response()->json(["data"=>true, "instruction"=>"delete successfully"],201);
    }
}