<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "map_id"
    ];
    // CREATE  AND UPDATE PROVINCE
    public static function store($request, $id=null){
        $province = $request->only(
            [
                "name",
                "map_id",
            ]
        );
        $province= self::updateOrcreate(["id"=>$id],$province);
        return $province;
    }
}
