<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImageRequest;
use App\Http\Resources\ImageResource;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    // DISPLAY A LISTING OF THER RESOURCE
    public function index()
    {
        $images = Image::all();
        $images = ImageResource::collection($images);
        return response()->json(["data"=>true, "image"=>$images],200);
    }

    // STORE A NEWLY CREATED RESOURCE IN STORAGE.
    public function store(Request $request)
    {
        $image = Image::store($request);
        return response()->json(["data"=>true, "image"=>$image],200);
    }

    // DISPLAY THE SPECIFIED RESOURCE.
    public function show(string $id)
    {
        $image = Image::find($id);
        return response()->json(["data"=>true, "image"=>$image],200);
    }

    // UPDATE THE SPECIFIED RESOURCE IN STORAGE.
    public function update(Request $request, string $id)
    {
       $image = Image::store($request,$id);
        return response()->json(["data"=>true, "image"=>$image],200);
    }

    // REMOVE THE SPECIFIED RESOURCE FROM STORAGE.
    public function destroy(string $id)
    {
        $image = Image::find($id);
        if(!$image){
        return response()->json(["data"=> false,"image"=>"not found id"." " .$id]);
        }
        $image->delete();
        return response()->json(["data"=>true, "image"=>"delete successfully"]);
    }
}