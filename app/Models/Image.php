<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        "typeImage",
        "drone_id",
        "province_id",
        "map_id",
       
    ];
    public static function store($request ,$id=null){
        $image = $request->only(
            [
                "typeImage",
                "drone_id",
                "province_id",
                "map_id",
            ]
        );
        $image = self::updateOrCreate(["id"=>$id],$image);
        return $image; 
    }
}
