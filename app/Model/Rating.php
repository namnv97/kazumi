<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'rating';

    public function user()
    {
    	return $this->belongsTo('App\Model\User','user_id','id')->first();
    }
    public function product()
    {
    	return $this->belongsTo('App\Model\Product','product_id','id')->first();
    }
}
