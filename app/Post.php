<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['user_id', 'image', 'likes', 'id', 'description'];
    public function comments() {
        return $this->hasMany('App\Comment');
    }
    public function user() {
        return $this->hasOne('App\User');
    }
}
