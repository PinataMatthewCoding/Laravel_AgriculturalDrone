<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $fillable = [
        'pesticide_type',
        'seed_type',
        'weight',
        'height',
        'shape',
        'date'
       
    ];
    public static function store($request ,$id=null){
        $user = $request->only([
            'pesticide_type',
            'seed_type',
            'weight',
            'height',
            'shape',
            'date'
        ]);
        $users =self::updateOrCreate(['id'=>$id],$user);
        return $users; 
    }
}
