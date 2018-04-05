<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['comment'];
    protected $hidden = ['post_id', 'user_id', 'updated_at'];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function post() {
        return $this->belongsTo('App\Post');
    }
}
