<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

    protected $fillable = [
    	'line_id', 'dealer_id', 'customer_name', 'address', 'city', 'deleted'
    ];

    public function Dealer()
    {
    	return $this->belongsTo('App\Dealer');
    }

}
