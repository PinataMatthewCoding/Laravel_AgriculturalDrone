<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProvinceRequest;
use App\Http\Resources\ProvinceResource;
use App\Http\Resources\ShowProvinceResource;
use App\Models\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    // DISPLAY A LISTING OF THER RESOURCE
    public function index()
    {
        $provinces = Province::all();
        $provinces = ProvinceResource::collection($provinces);
        return response()->json(["data"=>true ,"province"=>$provinces], 200);
    }

    // STORE A NEWLY CREATED RESOURCE IN STORAGE.
    public function store(Request $request)
    {
        $province = Province::store($request);
        return response()->json(["data"=>true, "province" =>$province],200);
    }

    // DISPLAY THE SPECIFIED RESOURCE.
    public function show(string $id)
    {
        $province = Province::find($id);
        $province = Province::where('name','like','%'.$id.'%')->get();
        if(!$province){
           return response()->json(["province"=>"not found id ".$id],404);
        }
        $province = new ShowProvinceResource($province);
        return response()->json(["data"=>true, "province" =>$province],200);
    }

    // UPDATE THE SPECIFIED RESOURCE IN STORAGE.
    public function update(StoreProvinceRequest $request, string $id)
    {
        $province = Province::store($request,$id);
        return response()->json(["data"=>true, "province" =>$province],200);
    }

    // REMOVE THE SPECIFIED RESOURCE FROM STORAGE.
    public function destroy(string $id)
    {
        $province = Province::find($id);
        if(!$province){
            return response()->json(["data"=> false,"province"=>"not found id"." " .$id]);
        }
        $province->delete();
        return response()->json(["data"=>true ,"province"=>"delete successfully"], 201);
    }
}