<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Drone extends Model
{
    use HasFactory;
    protected $fillable = [
        "drone_id",
        "country",
        "company",
        "endurance",
        "range",
        "battery",
        "playload_cap",
        "max_speed",
        "user_id",
        "location_id"
    ];
    // CREATE  AND UPDATE DRONES
    public static function store($request, $id=null){
      
        $drone = $request->only(
            [
                "drone_id",
                "country",
                "company",
                "endurance",
                "range",
                "battery",
                "playload_cap",
                "max_speed",
                "user_id",
                "location_id"
            ]
        );
        $drones= self::updateOrcreate(["id"=>$id],$drone);
        return $drones;
    }
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function maps():HasMany
    {
        return $this->hasMany(Map::class);
    }
    public function location():BelongsTo
    {
        return $this->belongsTo(Location::class);
    }
    public function plans()
    {
        return $this->belongsToMany(Plan::class,'drone_plans')->withTimestamps();
    }
}




// public function store(Request $request){

//     $id = IdGenerator::generate(['table' => 'todos', 'length' => 6, 'prefix' => date('y')]);
   
//     $todo = new Todo();
//     $todo->id = $id;
//     $todo->title = $request->get('title');
//     $todo->save();
   
//    }