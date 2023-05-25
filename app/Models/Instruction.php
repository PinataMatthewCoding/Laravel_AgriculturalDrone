<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instruction extends Model
{
    use HasFactory;
    protected $fillable = [
        "brand",
        "type",
        "max_flight_time",
        "description",
        "instruction",
    ];
    // Create and update instruction
    public static function store($request, $id=null){
        $instructions = $request->only(
            [
                "brand",
                "type",
                "max_flight_time",
                "description",
                "instruction",
            ]
        );
        $instructions = self::updateOrcreate(["id"=>$id],$instructions);
        return $instructions;
    }
}
