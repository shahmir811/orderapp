<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    protected $table = 'distributors';

    public function location()
    {
    	return $this->belongsTo('App\Location');
    }

    public function dealers()
    {
    	return $this->hasMany('App\Dealer');
    }
}
