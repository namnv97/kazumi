<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoreCreateArticle;
use App\Http\Requests\StoreEditArticle;

use App\Model\Article;
use App\Model\User;

use Auth;


class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $key = $request->q;
        if(!empty($key)):
            $articles = Article::where('title','like',"%$key%")->orderBy('created_at','desc')->paginate(10);
            $articles->withPath('?q='.$key);
        else:
        $articles = Article::orderBy('created_at','desc')->paginate(10);
        endif;
        
        return view('server.article.index',compact('articles'));
    }

    public function create()
    {
        $user = Auth::user();
 
        if ($user->can('create', Article::class)) {
            echo 'Current logged in user is allowed to create new posts.';
        } else {
            echo 'Not Authorized';
        }
    
        exit;


        //return view('server.article.create');
    }

    public function postCreate(StoreCreateArticle $request)
    {
        $req = $request->only(['title','slug','description','article_content','thumbnail']);
        $article = new Article();
        foreach($req as $field => $val):
            $article->$field = $val;
        endforeach;
        $article->user_id = Auth::user()->id;
        $article->save();
        return redirect()->route('admin.articles.edit',['id' => $article->id]);
    }

    public function edit($id = null)
    {
        if($id == null) return back();
        $article = Article::find($id);
        return view('server.article.edit',compact('article'));
    }

    public function postEdit(StoreEditArticle $request,$id = null)
    {
        $req = $request->only(['title','slug','description','article_content','thumbnail']);
        $id = $request->id;
        $article = Article::find($id);
        foreach($req as $field => $val):
            $article->$field = $val;
        endforeach;
        $article->save();
        return redirect()->route('admin.articles.edit',['id' => $article->id])->with('msg',"Cập nhật thành công");
    }

    public function delete($id)
    {
    	return redirect()->route('admin.articles.index');
    }

    public function check_slug(Request $request)
    {
        $slug = $request->slug;

        $article = Article::where('slug',$slug)->first();

        if(!empty($article)) return response()->json(['status' => 'errors','msg' => "Đường dẫn đã tồn tại"]);
    }
}
