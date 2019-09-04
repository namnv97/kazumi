<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

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
}
