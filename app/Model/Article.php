<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';

    public function excerpt()
    {
    	$excerpt = strip_tags($this->article_content);

    	return $excerpt;
    }
}
