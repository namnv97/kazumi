<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

use DB;

class User extends Model
{
    protected $table = 'users';

    public function hasRole($has){
    	$role = $this->belongsTo('App\Model\RoleUser','id')->first();
    	if(empty($role)) return false;
    	$slug = $role->belongsTo('App\Model\Roles','role_id')->first();
    	if(empty($slug)) return false;
        return ($slug->slug == $has)?true:false;
    }

    public function point()
    {
    	return 'App\Model\Reward'::select(DB::raw('SUM(point) as point'))->where('user_id',$this->id)->first();
    }
}
