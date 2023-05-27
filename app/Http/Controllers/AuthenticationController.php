<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    //

    public function register(StoreUserRequest $request)
    {
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make($request->password)
        ]);
        $token = $user->createToken("api")->plainTextToken;
        return response()->json(['success' =>true, 'data' => $user,'token'=>$token],201);
        
    }



    public function login(Request $request){
        $creadentail = $request->only(['email','password']);
        if(Auth::attempt($creadentail)){
            $user = Auth::user();
            // dd($user);
            $token = $user->createToken("API-TOKEN")->plainTextToken;
            return response()->json(['data'=>$user,'token'=>$token],200);
        }
        return response()->json(['messaage' =>'Invalid creadentail'],401);
    }


    public function logout(Request $request){
 
        // dd(Auth::user());
        request()->user()->tokens()->delete();
        return response()->json(['messaage' =>'logout successful'],200);
    }
}
