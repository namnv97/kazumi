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
}
