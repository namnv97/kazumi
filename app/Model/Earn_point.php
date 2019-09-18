<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use Auth;

class Earn_point extends Model
{
    //
     protected $table = 'earn_points';

     public function check_point()
     {
     	$title = $this->title;
     	$reward = 'App\Model\Reward'::where([
     		['action',$title],
     		['user_id',Auth::user()->id]
     	])->first();

     	if(empty($reward)) return true;
     	return false;
     }
}
