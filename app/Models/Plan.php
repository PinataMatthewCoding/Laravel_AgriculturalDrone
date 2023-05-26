<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
    // CREATE AND UPDATE PLAN
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
    public function locations():BelongsToMany
    {
        return $this->belongsToMany(Location::class,'location_plans');
    }
    public function drone():BelongsTo
    {
        return $this->belongsTo(Drone::class);
    }
    
    public function instruction():HasOne
    {
        return $this->HasOne(Instruction::class);
    }
}
