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

    public function discount()
    {
    	return $this->belongsTo('App\Model\Discount','discount_id','id')->first();
    }

    public function get_voucher()
    {
    	return $this->belongsTo('App\Model\Voucher','voucher_id','id')->first();
    }

    public function user()
    {
        return $this->belongsTo('App\Model\User','user_id','id')->first();
    }
}
