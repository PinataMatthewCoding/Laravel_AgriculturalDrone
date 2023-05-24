<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Farm extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "address",
        "map_id"
    
    ];
    public static function store($request ,$id=null){
        $farm = $request->only(
            [
                "name",
                "address",
                "map_id"
            ]
        );
        $farms =self::updateOrCreate(["id"=>$id],$farm);
        return $farms; 
    }
    public function map():BelongsTo
    {
        return $this->belongsTo(Map::class);
    }
}
