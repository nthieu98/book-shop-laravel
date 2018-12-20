<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    //
    public function users(){
    	return $this->hasMany('App\UserModel','userId');
    }
}
