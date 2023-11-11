<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // ▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄ relaciones con la PK de la tabla ▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄
    public function sites_web()
    {
        // la llave primaria de esta tabla 'users' se propaga en 'sites_web'
        // la FK que se propaga a la tabla 'sites_web' es explícitamente 'user_id'
        return $this->hasOne(Site_Web::class, 'user_id'); // 1:1
    }
}
