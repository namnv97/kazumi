<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Essential extends Model
{
    protected $table = 'essentials';

    public function product()
    {
    	return $this->belongsTo('App\Model\Product','essential_product_id','id')->first();
    }
}
