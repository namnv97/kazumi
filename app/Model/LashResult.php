<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use App\Model\StepLash;
use App\Model\StepItem;

class LashResult extends Model
{
    protected $table = 'lash_guide_result';

    public function step($slug)
    {
    	return StepLash::where('slug',$slug)->first();
    }

    public function stepitem($id)
    {
    	return StepItem::find($id);
    }

}
