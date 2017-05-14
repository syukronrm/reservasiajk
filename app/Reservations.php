<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
	public $timestamps = false;
    
    public function user() {
    	return $this->belongsTo('App\User', 'user_id');
    }
}
