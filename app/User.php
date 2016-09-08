<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function entries()
    {
        return $this->hasMany('App\Entry');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public static function getInfo($user_id)
    {
        $info = User::where('id', $user_id)->get(['name', 'email'])->first();
        return $info;
    }
}
