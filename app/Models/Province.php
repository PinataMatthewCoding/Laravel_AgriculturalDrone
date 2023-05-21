<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
    public function images():HasMany
    {
        return $this->hasMany(Image::class);
    }
    public function map():BelongsTo
    {
        return $this->belongsTo(Map::class);
    }
    public function locations():HasMany
    {
        return $this->hasMany(Location::class);
    }
}
