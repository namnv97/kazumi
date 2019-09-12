<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';

    public function cart_item()
    {
    	return $this->hasMany('App\Model\CartItem','cart_id','id')->get();
    }
}
