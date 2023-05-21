<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        "user_id",
        "map_id",
        "location_id"
    ];
    // CREATE  AND UPDATE DRONES
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
                "user_id",
                "map_id",
                "location_id"
            ]
        );
        $drone= self::updateOrcreate(["id"=>$id],$drone);
        return $drone;
    }
    public function images():HasMany
    {
        return $this->hasMany(Image::class);
    }
}