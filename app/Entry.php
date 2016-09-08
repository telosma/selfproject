<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Entry extends Model
{
	protected $table = 'entries';
	protected $fillable = ['id', 'title', 'body', 'user_id'];
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function comments()
    {
    	return $this->hasMany('App\Comment');
    }

    public static function countEntry($user_id)
    {
        $result = User::where('id', $user_id)->first()->entries->count();
        return $result;
    }
}
