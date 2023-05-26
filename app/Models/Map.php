<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Symfony\Component\CssSelector\Node\HashNode;

class Map extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "typeImage",
        "description",
        "drone_id",
        "farm_id"
    ];

    // Create and update maps
    public static function store($request, $id=null){
        $map = $request->only(
            [
                "name",
                "typeImage",
                "description",
                "drone_id",
                "farm_id"
            ]
        );
        $map= self::updateOrcreate(["id"=>$id],$map);
        return $map;
    }
    
   
    public function locations():HasMany
    {
        return $this->hasMany(Location::class);
    }
    public function drone():BelongsTo
    {
        return $this->belongsTo(Drone::class);
    }
    public function farm():BelongsTo
    {
        return $this->belongsTo(Farm::class);
    }
}