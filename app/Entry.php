<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
