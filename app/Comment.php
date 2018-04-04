<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['post_id', 'user_id', 'comment'];
    public function user(){
        $this->hasOne('App\user');
    }
    public function post() {
        $this->hasOne('App\Post');
    }
}
