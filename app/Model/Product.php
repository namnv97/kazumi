<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public function description()
    {
    	$description = strip_tags($this->description);

    	return $description;
    }

    public function gallery()
    {
    	return $this->hasMany('App\Model\Gallery','product_id','id');
    }

    public function price()
    {
    	return $this->belongsTo('App\Model\Pack','id','product_id')->where('type','single')->first();
    }

    public function price_multi()
    {
    	return $this->belongsTo('App\Model\Pack','id','product_id')->where('type','multi')->first();
    }
}
