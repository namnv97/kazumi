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
    	$articles = Article::orderBy('created_at','desc')->paginate(12);
    	return view('client.article.archive',compact('articles'));

    }

    public function article($slug = null)
    {
    	if($slug == null) return redirect()->route('home');

    	$article = Article::where('slug',$slug)->first();

        $relates = Article::where('id','<>',$article->id)
        ->orderBy('created_at','desc')
        ->take(2)
        ->select('title','slug','thumbnail')
        ->get()
        ->toArray();

    	return view('client.article.single',compact('article','relates'));

    }
}
