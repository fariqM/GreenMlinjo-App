<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    public function favourites(){
        return $this->hasMany(Favourite::class);
    }

    public function carts(){
        return $this->hasMany(Cart::class);
    }
    
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function orders(){
        return $this->hasMany(Order::class, 'costumer_id', 'id');
    }

    public function driver_orders(){
        return $this->hasMany(Order::class, 'driver_id', 'id');
    }

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone'
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
}
