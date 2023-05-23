<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instruction extends Model
{
    use HasFactory;
    protected $fillable = [
        "id",
        "instruction",
        "change_battery",
        "inspect_damage",
        "find_place",
        "start_small",
    ];
    // CREATE  AND UPDATE INSTRUCTION
    public static function store($request, $id=null){
        $instructions = $request->only(
            [
                "id",
                "instruction",
                "change_battery",
                "inspect_damage",
                "find_place",
                "start_small",
            ]
        );
        $instructions = self::updateOrcreate(["id"=>$id],$instructions);
        return $instructions;
    }
}
