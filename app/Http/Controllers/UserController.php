<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\ShowUserResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // display a listing of ther resource.
    public function index()
    {
        $user = User::all();
        $user = UserResource::collection($user);
        return response()->json(["data"=>true ,"users"=>$user], 200);
    }

    // store a newly created resource in storage.
    public function store(StoreUserRequest $request)
    {
        $user = User::store($request);
        return response()->json(["data"=>true ,"users"=>$user], 200);
    }

    // display the specified resource.
    public function show(string $id)
    {
        $user =User::find($id);
        if(!$user){
            return response()->json(["data"=>"not found id ".$id],404);
        }
        $user = new ShowUserResource($user);
        return response()->json(["data"=>true ,"users"=>$user], 200);
    }

    // update the specified resource in storage.
    public function update(StoreUserRequest $request, string $id)
    {
        $user =User::store($request,$id);
        return response()->json(["data"=>true ,"users"=>$user], 200);
    }

    // remove the specifide resource from storage
    public function destroy(string $id)
    {
        $user =User::find($id);
        if(!$user){
            return response()->json(["data"=>"not found ".$id],404);
        }
        $user->delete(); 
        return response()->json(["data"=>true ,"users"=>"successfully"], 200);
    }
}