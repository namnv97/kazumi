<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\Factory;

use View;

use App\Model\Article;

class ArticleController extends Controller
{
    public function archive()
    {
    	$articles = Article::orderBy('created_at','desc')->paginate(1);
    	return view('client.article.archive',compact('articles'));

    }

    public function article($slug = null)
    {
    	if($slug == null) return redirect()->route('home');

    	$article = Article::where('slug',$slug)->first();

    	return view('client.article.single',compact('article'));

    }
}
