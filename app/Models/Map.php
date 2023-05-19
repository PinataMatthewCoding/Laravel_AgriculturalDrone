<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    use HasFactory;
    protected $fillable = [
        "description",
    ];

    // CREATE  AND UPDATE MAPS
    public static function store($request, $id=null){
        $map = $request->only(
            [
                "description",
            ]
        );
        $map= self::updateOrcreate(["id"=>$id],$map);
        return$map;
    }
}