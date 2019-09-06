<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Option;
use App\Model\Product;
use App\Model\Collection;
use App\Model\CartItem;
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $slides = Option::where('meta_key','slide')->get();
        $product = Option::where('meta_key','product')->get();
        
        foreach ($product as $key => $value) {
            if($key == 0)
                $pro = $pro->where('id',$value->meta_value);
            else
                $pro = $pro->orWhere('id',$value->meta_value);
        }

        $products = isset($pro) ? $pro->get() : [];


        $collection_id = Option::where('meta_key','collection')->get();

       
        foreach ($collection_id as $key => $value) {
            if($key == 0)
                $collections = $collections->where('id',$value->meta_value);
            else
                $collections = $collections->orWhere('id',$value->meta_value);
        }

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

       
        foreach ($product_look_id as $key => $value) {
            if($key == 0)
                $products_look = $products_look->where('id',$value->meta_value);
            else
                $products_look = $products_look->orWhere('id',$value->meta_value);
        }

        $products_look = isset($products_look) ? $products_look->get() : [];

       
        $products_look_gallery = Option::where('meta_key','product_look_gallery')->get();

        $look_title1 = Option::where('meta_key','look_title1')->get()->first();
        $look_title2 = Option::where('meta_key','look_title2')->get()->first();


        // echo "<pre>";
        // print_r($product->toArray());

        // die();
        return view('client.home',compact('slides','products','collections','collection_gallery','collection_title','about_gallery','about_content','about_title2','about_title1','video_title1','video_title2','video_gallery','video','products_look','products_look_gallery','look_title2','look_title1'));


    }


    public function getCollection($id,Request $rq)
    {
        $collection = Collection::find($id);
        
        
        $products = Product::join('packs', 'packs.product_id', '=', 'products.id')
                        ->join('product_collection', 'product_collection.product_id', '=', 'products.id')
                        ->join('collections','collections.id','=','product_collection.collection_id')
                        ->where('packs.type','single')->where('collections.id',$id);

        $products = $products->select(DB::raw('(CASE WHEN packs.sale IS NOT NULL THEN packs.sale   ELSE packs.price END) AS ninh'),'products.*','packs.price','packs.sale');

        // echo "<pre>";
        // print_r($products->toArray());
        // die();


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

        // $ninh = CartItem::select( DB::raw('SUM(quantity) as total'),'cart_items.*')
        //         ->groupBy('pack_id')
                
        //         ->get();
        $ninh = Product::join('packs', 'products.id', '=', 'packs.product_id')
                        ->join('cart_items', 'cart_items.pack_id', '=', 'packs.id')
                        ->select('products.*', DB::raw('SUM(quantity) as total'))->groupBy('pack_id');

        // $ninh = CartItem::selectRaw('select SUM(quantity) as total, `cart_items`.* from `cart_items` group by `pack_id`');
                  
        //$ninh = CartItem::all();
        
        if(isset($rq->sort_by) && $rq->sort_by == 'best-selling')
        $products = $ninh->orderBy('total','DESC')->get();

    
       
        
        return view('client.collection',compact('products'));
    }
}
