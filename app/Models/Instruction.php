<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Instruction extends Model
{
    use HasFactory;
    protected $fillable = [
        "brand",
        "type",
        "is_action",
        "description",
        "instruction",
        "drone_id",
        "plan_id"
    ];
    // Create and update instruction
    public static function store($request, $id=null){
        $instructions = $request->only(
            [
                "brand",
                "type",
                "is_action",
                "description",
                "instruction",
                "drone_id",
                "plan_id"
            ]
        );
        $instructions = self::updateOrcreate(["id"=>$id],$instructions);
        return $instructions;
    }
    
    public function plan():BelongsTo
    {
        return $this->belongsTo(Plan::class);
    }

    public function drone():BelongsTo
    {
        return $this->belongsTo(Drone::class);
    }
   

   
}


    
   

