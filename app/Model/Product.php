<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public function description()
    {
    	$description = strip_tags($this->description);

    	return $description;
    }
}
