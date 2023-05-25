<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Instruction extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "band",
        "type",
        "max_flight_time",
        "description",
        "instruction",
    ];
    // CREATE  AND UPDATE INSTRUCTION
    public static function store($request, $id=null){
        $instructions = $request->only(
            [
                "name",
                "band",
                "type",
                "max_flight_time",
                "description",
                "instruction",
            ]
        );
        $instructions = self::updateOrcreate(["id"=>$id],$instructions);
        return $instructions;
    }
    public function plan():HasOne
    {
        return $this->HasOne(Plan::class);
    }
   
}
