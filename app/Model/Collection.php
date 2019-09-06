<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $table = 'collections';

    public function parent_name()
    {
    	$cat = $this->belongsTo('App\Model\Collection','parent')->first();
    	return empty($cat)?FALSE:$cat->name;
    }

    public function products()
    {
    	return $this->hasManyThrough(
            'App\Model\Product', 'App\Model\ProductCollection',
            'collection_id', 'id', 'id' , 'product_id'
        )->orderBy('name','DESC');
    }

    public function product_collect()
    {
        return $this->hasMany('App\Model\ProductCollection','collection_id','id');
    }
}
