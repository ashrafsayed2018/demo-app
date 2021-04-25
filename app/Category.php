<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['user_id','category_name','slug','image'];

    public function user() {

        return $this->belongsTo('App/User');
    }

    public function posts() {
        return $this->hasMany('App/Post');
    }
}
