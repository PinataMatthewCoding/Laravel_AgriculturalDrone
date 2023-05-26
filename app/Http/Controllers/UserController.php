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

    // store a newly created resource in storage.
    public function store(StoreUserRequest $request)
    {
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make($request->password)
        ]);
        $token = $user->createToken("api")->plainTextToken;
        return response()->json(['success' =>true, 'data' => $user,'token'=>$token],201);
        
    }

    // --------------------------login-------------------------------------
    public function login(Request $request){
        $creadentail = $request->only('email','password');
        if(Auth::attempt($creadentail)){
            $user = Auth::user();
            dd($user);
            $token = $user->createToken("API-TOKEN")->plainTextToken;
            return response()->json(['data'=>$token],200);
        }
        return response()->json(['messaage' =>'Invalid creadentail'],401);
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