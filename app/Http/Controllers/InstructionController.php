<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreInstructionRequest;
use App\Http\Resources\InstructionResource;
use App\Http\Resources\ShowInstructionResource;
use App\Models\Instruction;
class InstructionController extends Controller
{
    // DISPLAY A LISTING OF THER RESOURCE
    public function index()
    {
        $instructions = Instruction::all();
        $instructions = InstructionResource::collection($instructions);
        return response()->json(["data"=>true, "instruction"=>$instructions], 200);
    }

    // STORE A NEWLY CREATED RESOURCE IN STORAGE.
    public function store (StoreInstructionRequest $request)
    {
        $instructions = Instruction::store($request);
        return response()->json(["data"=>true, "instruction"=>$instructions],200);
    }

    // DISPLAY THE SPECIFIED RESOURCE.
    public function show(string $id)
    {
        $instructions = Instruction::find($id);
        if(!$instructions){
            return response()->json(["instruction"=>"not found id"." " .$id],404);
        }
        $instructions = new ShowInstructionResource($instructions);
        return response()->json(["data"=>true, "instruction"=>$instructions],200);
    }

    // UPDATE THE SPECIFIED RESOURCE IN STORAGE.
    public function update(StoreInstructionRequest $request, string $id)
    {
        $instructions = Instruction::store($request,$id);
        return response()->json(["data"=>true, "instruction"=>$instructions],200);
    }

    // REMOVE THE SPECIFIED RESOURCE FROM STORAGE.
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