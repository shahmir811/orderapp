<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'locations';

    public function distributors()
    {
    	return $this->hasMany('App\Distributor');
    }

    public function companies()
    {
    	return $this->hasMany('App\Company');
    }


}
