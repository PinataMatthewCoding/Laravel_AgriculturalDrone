<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $fillable = [
        "lattitude",
        "lngtiude",
       
    ];
    public static function store($request ,$id=null){
        $locaion = $request->only(
            [
                "lattitude",
                "lngtiude"
            ]
        );
        $locations =self::updateOrCreate(["id"=>$id],$locaion);
        return $locations; 
    }
}
