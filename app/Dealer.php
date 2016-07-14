<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dealer extends Model
{
    protected $table = 'dealers';

    public function Distributor()
    {
    	return $this->belongsTo('App\Distributor');
    }

    public function customers()
    {
    	return $this->hasMany('App\Customer');
    }
}
