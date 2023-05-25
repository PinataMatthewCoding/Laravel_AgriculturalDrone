<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Hash;

class User extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    // Create and update user
    public static function store($request ,$id=null){
        $user = $request->only(
            [
                "name",
                "email",
                "password"
            ]
        );
        $users["password"] = Hash::make($request->password);
        $users =self::updateOrCreate(["id"=>$id],$user);
        return $users; 
    }

    public function drones():HasMany
    {
        return $this->hasMany(Drone::class);
    }
}