<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\ShowUserResource;
use App\Http\Resources\UserResource;
use App\Models\User;

use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    // display a listing of ther resource.
    public function index()
    {
        $user = User::all();
        $user = UserResource::collection($user);
        return response()->json(["data"=>true ,"users"=>$user], 200);
    }


    // display the specified resource.
    public function show(string $id)
    {
        $user = User::find($id);
        if(!$user){
            return response()->json(["data"=>"not found id ".$id],404);
        }
        $user = new ShowUserResource($user);
        return response()->json(["data"=>true ,"users"=>$user], 200);
    }

}