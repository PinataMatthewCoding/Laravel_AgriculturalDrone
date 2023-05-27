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
<<<<<<< HEAD
        "map_id"
=======
        
    
>>>>>>> be5c5059756b77d09aa35277a84595feee92e96b
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
<<<<<<< HEAD

    public function map():BelongsTo
=======
    public function maps():HasMany
>>>>>>> be5c5059756b77d09aa35277a84595feee92e96b
    {
        return $this->hasMany(Map::class);
    }
}
