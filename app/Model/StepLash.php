<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class StepLash extends Model
{
    protected $table = 'step_lash';

    public function stepitem()
    {
    	return $this->hasMany('App\Model\StepItem','step_id','id')->get();
    }

    public function next_step()
    {
    	return 'App\Model\StepLash'::where('order','>',$this->order)->orderBy('order','asc')->first();
    }

    public function prev_step()
    {
    	return 'App\Model\StepLash'::where('order','<',$this->order)->orderBy('order','desc')->first();
    }


}
