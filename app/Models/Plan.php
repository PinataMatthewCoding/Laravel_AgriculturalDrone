<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
        "date"
       
    ];

    public function drones()
    {
        return $this->belongsToMany(Drone::class,'drone_plans')->withTimestamps();
    }
    public static function store($request ,$id=null){
<<<<<<< HEAD
        $plan = $request->only([
            'pesticide_type',
            'seed_type',
            'weight',
            'height',
            'shape',
            'date'
        ]);
        $plans =self::updateOrCreate(['id'=>$id],$plan);
        $drones = request('drones');
        $plans->drones()->sync($drones);
        return $plans; 
=======
        $user = $request->only(
            [
                "pesticide_type",
                "seed_type",
                "weight",
                "height",
                "shape",
                "date"
            ]
        );
        $users =self::updateOrCreate(["id"=>$id],$user);
        return $users; 
>>>>>>> 85441491362ba6a50d900e12a7af222b7e35f840
    }
    public function locations():BelongsToMany
    {
        return $this->belongsToMany(Location::class,'location_plans');
    }
   
}
