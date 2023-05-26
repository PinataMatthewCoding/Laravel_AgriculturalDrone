<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
        "location_id"
    ];
    // Create and update drone
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
                "location_id",
            ]
        );
        $drones= self::updateOrCreate(["id"=>$id],$drone);
        return $drones;
    }
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function maps():HasMany
    {
        return $this->hasMany(Map::class);
    }
    public function location():BelongsTo
    {
        return $this->belongsTo(Location::class);
    }
    public function plans():HasMany
    {
        return $this->hasMany(Plan::class);
    }

    public function instructions():HasMany
    {
        return $this->hasMany(Instruction::class);
    }
}




