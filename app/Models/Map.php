<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Symfony\Component\CssSelector\Node\HashNode;

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
        return $map;
    }
    public function images():HasMany
    {
        return $this->hasMany(Image::class);
    }
    public function provinces():HasMany
    {
        return $this->hasMany(Province::class);
    }
    public function locations():HasMany
    {
        return $this->hasMany(Location::class);
    }
    public function drones():HasMany
    {
        return $this->hasMany(Drone::class);
    }
}