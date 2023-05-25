<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Plan extends Model
{
    use HasFactory;
    protected $fillable = [
        "pesticide_type",
        "seed_type",
        "weight",
        "height",
        "shape",
        "start_time",
        "end_time",
        "drone_id",
        "instruction_id"
    ];
    // Create and update plan
    public static function store($request ,$id=null){
        $plan = $request->only(
            [
                "pesticide_type",
                "seed_type",
                "weight",
                "height",
                "shape",
                "start_time",
                "end_time",
                "drone_id",
                "instruction_id"
            ]
        );
        $plans =self::updateOrCreate(['id'=>$id],$plan);
        return $plans; 
    }
<<<<<<< HEAD

    public function drones()
    {
        return $this->belongsToMany(Drone::class,'drone_plans')->withTimestamps();
    }
=======
>>>>>>> d4cc04933bb0e89c22aad08144f33b94fb7a8df8
    public function locations():BelongsToMany
    {
        return $this->belongsToMany(Location::class,'location_plans');
    }
<<<<<<< HEAD
=======
    public function drone():BelongsTo
    {
        return $this->belongsTo(Drone::class);
    }
    
    public function instruction():HasOne
    {
        return $this->HasOne(Instruction::class);
    }
>>>>>>> d4cc04933bb0e89c22aad08144f33b94fb7a8df8
}
