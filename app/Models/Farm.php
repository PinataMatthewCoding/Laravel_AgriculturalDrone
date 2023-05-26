<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Farm extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "address",
        
    
    ];
    public static function store($request ,$id=null){
        $farm = $request->only(
            [
                "name",
                "address",
              
            ]
        );
        $farms =self::updateOrCreate(["id"=>$id],$farm);
        return $farms; 
    }
    public function maps():HasMany
    {
        return $this->hasMany(Map::class);
    }
}
