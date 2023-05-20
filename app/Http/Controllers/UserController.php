<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserShowResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\Cache\Store;
class UserController extends Controller
{
    // DISPLAY A LISTING OF THER RESOURCE
    public function index()
    {
        $user = User::all();
        $user = UserResource::collection($user);
        return response()->json(["data"=>true ,"users"=>$user], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        //
        
        $user = User::store($request);
        return response()->json(["data"=>true ,"users"=>$user], 200);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $user =User::find($id);
        if(!$user){
            return response()->json(["data"=>"not found id ".$id],404);
        }
        $user = new UserShowResource($user);
        return response()->json(["data"=>true ,"users"=>$user], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUserRequest $request, string $id)
    {
        //
        $user =User::store($request,$id);
        $user = new UserShowResource($user);
        return response()->json(["data"=>true ,"users"=>$user], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $user =User::find($id);
        if(!$user){
            return response()->json(["data"=>"not found ".$id],404);
        }
        $user->delete(); 
        return response()->json(["data"=>true ,"users"=>"successfully"], 200);
    }
}
