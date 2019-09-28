<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserRef extends Model
{
    protected $table = 'user_ref';

    public function user_ori()
   	{
   		return $this->belongsTo('App\Model\User','user_id','id')->first();
   	}
}
