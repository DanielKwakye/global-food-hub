<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    public function registrations(){
    	return $this->hasMany('App\Registration');
    }
}
