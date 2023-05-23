<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "email",
        "password"
       
    ];
    public static function store($request ,$id=null){
        $user = $request->only(
            [
                "name",
                "email",
                "password"
            ]
        );
        $users =self::updateOrCreate(["id"=>$id],$user);
        return $users; 
    }
    public function drones():HasMany
    {
        return $this->hasMany(Drone::class);
    }
}
