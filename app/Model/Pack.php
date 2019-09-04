<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pack extends Model
{
    protected $table = 'packs';

    public function color()
    {
    	$packcolor = $this->hasMany('App\Model\PackColor','pack_id','id')->leftJoin('colors','colors.id','packs_colors.color_id')->select('colors.*')->get();

    	return $packcolor;
    }
}
