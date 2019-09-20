<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Option;
use App\Model\Product;
use App\Model\Collection;
use App\Model\CartItem;
use App\Model\Article;
use App\Model\Page;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        $slides = Option::where('meta_key','slide')->get();
        $product = Option::where('meta_key','product')->get();
        if(!empty($product)):
        foreach ($product as $key => $value) {
            if($key == 0)
                $pro = Product::where('id',$value->meta_value);
            else
                $pro = $pro->orWhere('id',$value->meta_value);
        }
        endif;
        $products = isset($pro) ? $pro->get() : [];


        $collection_id = Option::where('meta_key','collection')->get();

        if(!empty($collection_id)):
        foreach ($collection_id as $key => $value) {
            if($key == 0)
                $collections = Collection::where('id',$value->meta_value);
            else
                $collections = $collections->orWhere('id',$value->meta_value);
        }
        endif;

        

        //$collections = $collections->get();
        $collections = isset($collections) ? $collections->get() : [];

        $collection_gallery = Option::where('meta_key','collection_gallery')->get();
        $collection_title = Option::where('meta_key','collection_title')->get();


        $about_title1 = Option::where('meta_key','about_title1')->get();
        $about_title2 = Option::where('meta_key','about_title2')->get();
        $about_content = Option::where('meta_key','about_content')->get();
        $about_gallery = Option::where('meta_key','about_gallery')->get();

        $video_title1 = Option::where('meta_key','video_title1')->get()->first();
        $video_title2 = Option::where('meta_key','video_title2')->get()->first();
        $video_gallery = Option::where('meta_key','video_gallery')->get()->first();
        $video = Option::where('meta_key','video')->get()->first();

        $product_look_id = Option::where('meta_key','product_look_product')->get();

        if(!empty($product_look_id)):
        foreach ($product_look_id as $key => $value) {
            if($key == 0)
                $products_look = Product::where('id',$value->meta_value);
            else
                $products_look = $products_look->orWhere('id',$value->meta_value);
        }
        endif;

        $products_look = isset($products_look) ? $products_look->get() : [];

       
        $products_look_gallery = Option::where('meta_key','product_look_gallery')->get();

        $look_title1 = Option::where('meta_key','look_title1')->get()->first();
        $look_title2 = Option::where('meta_key','look_title2')->get()->first();

        $view_best_seller = Option::where('meta_key','view_best_seller')->first();

        if(!empty($request->ref)):

            $cookie = cookie('kzref',$request->ref,60*24);

            return response()->view('client.home',compact('slides','products','collections','collection_gallery','collection_title','about_gallery','about_content','about_title2','about_title1','video_title1','video_title2','video_gallery','video','products_look','products_look_gallery','look_title2','look_title1','view_best_seller'))->withCookie($cookie);
        else:
            return view('client.home',compact('slides','products','collections','collection_gallery','collection_title','about_gallery','about_content','about_title2','about_title1','video_title1','video_title2','video_gallery','video','products_look','products_look_gallery','look_title2','look_title1','view_best_seller'));
        endif;


    }


    public function getCollection($slug,Request $rq)
    {
        $collection = Collection::where('slug',$slug)->first();
        
        
        $products = Product::join('packs', 'packs.product_id', '=', 'products.id')
                        ->join('product_collection', 'product_collection.product_id', '=', 'products.id')
                        ->join('collections','collections.id','=','product_collection.collection_id')
                        ->where('packs.type','single')->where('collections.id',$collection->id);

        $products = $products->select(DB::raw('(CASE WHEN packs.sale IS NOT NULL THEN packs.sale   ELSE packs.price END) AS ninh'),'products.*','packs.price','packs.sale');


        if(isset($rq->sort_by) && $rq->sort_by == 'name_asc')
        $products = $products->orderBy('products.name');
        if(isset($rq->sort_by) && $rq->sort_by == 'name_desc')
        $products = $products->orderBy('products.name','DESC');

        if(isset($rq->sort_by) && $rq->sort_by == 'price_asc')
        $products = $products->orderBy('ninh');
        if(isset($rq->sort_by) && $rq->sort_by == 'price_desc')
        $products = $products->orderBy('ninh','DESC');
       
       
        if(isset($rq->sort_by) && $rq->sort_by == 'date_asc')
        $products = $products->orderBy('products.created_at','ASC');
        if(isset($rq->sort_by) && $rq->sort_by == 'date_asc')
        $products = $products->orderBy('products.created_at','DESC');

        $products = $products->get();

        $ninh = Product::join('packs', 'products.id', '=', 'packs.product_id')
                        ->join('cart_items', 'cart_items.pack_id', '=', 'packs.id')
                        ->select('products.*', DB::raw('SUM(quantity) as total'))->groupBy('pack_id');

        
        if(isset($rq->sort_by) && $rq->sort_by == 'best-selling')
        $products = $ninh->orderBy('total','DESC')->get();

    
       
        
        return view('client.collection.collection',compact('products','collection'));
    }

    public function getSearch(Request $rq)
    {
        $key = '%'.trim(strtolower($rq->key)).'%';

        $products = $data = Product::where('name','like',$key)->orWhere('description','like',$key)->orWhere('product_content','like',$key)->get();

        $pages = Page::where('name','like',$key)->get();
        $articles = Article::where('title','like',$key)->get();

        $s = $rq->key;

        return view('client.search.search',compact('articles','products','pages','s'));
    }

    public function search(Request $request)
    {
        $key = $request->s;
        $type = $request->type;
        switch ($type) {
            case 'product':
                $products = Product::where('name','like',"%$key%")->orWhere('description','like',"%$key%")->orWhere('product_content','like',"%$key%")->get();
                return view('client.search.product',compact('products'));
                break;
            
            case 'post':
                $pages = Page::where('name','like',"%$key%")->get();
                $articles = Article::where('title','like',"%$key%")->get();
                return view('client.search.post',compact('pages','articles'));
                break;
        }
    }
}
