<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class StepItem extends Model
{
    protected $table = 'step_item';

    public function step()
    {
    	return $this->belongsTo('App\Model\StepLash','step_id','id')->first();
    }
}
