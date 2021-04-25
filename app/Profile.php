<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $fillable = ['user_id', 'about','mobile_number','image','location','ipaddress','country','is_admin'];

    public function user () {
        return $this->belongsTo('App\User');
    }


}
