<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Plan extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
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
                "name",
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
=======

>>>>>>> be5c5059756b77d09aa35277a84595feee92e96b

    public function drones()
    {
        return $this->belongsToMany(Drone::class,'drone_plans')->withTimestamps();
    }
<<<<<<< HEAD
=======

>>>>>>> be5c5059756b77d09aa35277a84595feee92e96b
    public function locations():BelongsToMany
    {
        return $this->belongsToMany(Location::class,'location_plans');
    }
<<<<<<< HEAD
=======


>>>>>>> be5c5059756b77d09aa35277a84595feee92e96b
    public function drone():BelongsTo
    {
        return $this->belongsTo(Drone::class);
    }
    
    public function instruction():HasOne
    {
        return $this->HasOne(Instruction::class);
    }
<<<<<<< HEAD
=======

>>>>>>> be5c5059756b77d09aa35277a84595feee92e96b
}
