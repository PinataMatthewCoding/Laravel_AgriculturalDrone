<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
                "lngtiude",
            ]
        );
        $locations =self::updateOrCreate(["id"=>$id],$locaion);
        $plans = request('plans');
        $locations->plans()->sync($plans);
        return $locations; 
    }
    public function map():BelongsTo
    {
        return $this->belongsTo(Map::class);
    }
    public function drones():HasMany
    {
        return $this->hasMany(Drone::class);
    }
    public function plans():BelongsToMany
    {
        return $this->belongsToMany(Plan::class,'location_plans')->withTimestamps();
    }
}
