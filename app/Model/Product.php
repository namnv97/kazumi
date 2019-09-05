<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public function pack()
    {
        return $this->hasMany('App\Model\Pack','product_id','id');
    }

    public function gallery()
    {
    	return $this->hasMany('App\Model\Gallery','product_id','id')->where('galleries.type','image');
    }

    public function gallery_all()
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
