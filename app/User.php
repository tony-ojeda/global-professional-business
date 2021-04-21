<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    protected $guarded = [];

    protected $fillable = [
        // 'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        // 'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($pass){
        $this->attributes['password'] = Hash::make($pass);
    }

    public function hasRole($roles)
    {
        if(is_string($roles))
        {
            $roles = explode(" ",$roles);
        }

        if( $this->roles()->whereIn('code', $roles)->first() )
            return true;

        return false;
    }

    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    public function enterprises(){
        return $this->belongsToMany(Enterprise::class);
    }
}
