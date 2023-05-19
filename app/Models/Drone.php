<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drone extends Model
{
    use HasFactory;
    protected $fillable = [
        "drone_id",
        "country",
        "company",
        "endurance",
        "range",
        "battery",
        "playload_cap",
        "max_speed",
    ];
    // CREATE DRONES
    public static function store($request, $id=null){
        $drone = $request->only(
            [
                "drone_id",
                "country",
                "company",
                "endurance",
                "range",
                "battery",
                "playload_cap",
                "max_speed",
            ]
        );
        $drone= self::updateOrcreate(["id"=>$id],$drone);
        return $drone;
    }
}