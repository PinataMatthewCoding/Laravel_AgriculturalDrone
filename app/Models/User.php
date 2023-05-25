<?php

namespace App\Models;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Hash;
=======
// use Illuminate\Contracts\Auth\MustVerifyEmail;
>>>>>>> d4cc04933bb0e89c22aad08144f33b94fb7a8df8


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
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
<<<<<<< HEAD
    
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
=======
>>>>>>> d4cc04933bb0e89c22aad08144f33b94fb7a8df8

    public function drones():HasMany
    {
        return $this->hasMany(Drone::class);
    }
<<<<<<< HEAD
}
=======
}












>>>>>>> d4cc04933bb0e89c22aad08144f33b94fb7a8df8
