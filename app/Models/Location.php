<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Location extends Model
{
    use HasFactory;
    protected $fillable = [
        "lattitude",
        "lngtiude",
        "map_id",
        "province_id"
       
    ];
    public static function store($request ,$id=null){
        $locaion = $request->only(
            [
                "lattitude",
                "lngtiude",
                "map_id",
                "province_id"
            ]
        );
        $locations =self::updateOrCreate(["id"=>$id],$locaion);
        return $locations; 
    }
    public function province():BelongsTo
    {
        return $this->belongsTo(Province::class);
    }
    public function map():BelongsTo
    {
        return $this->belongsTo(Map::class);
    }
}
