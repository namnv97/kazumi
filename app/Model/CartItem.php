<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    //
    protected $table = 'cart_items';

    public function packs()
    {
    	return $this->belongsTo('App\Model\Pack','pack_id','id')->first();
    }

    public function color()
    {
    	return $this->belongsTo('App\Model\Color','color_id','id')->first();
    }
}
