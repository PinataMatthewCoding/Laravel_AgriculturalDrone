<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
    public function map():BelongsTo
    {
        return $this->belongsTo(Map::class);
    }
    public function drone():BelongsTo
    {
        return $this->belongsTo(Drone::class);
    }
    public function province():BelongsTo
    {
        return $this->belongsTo(Province::class);
    }
}
