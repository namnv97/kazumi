<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Option;
use App\Model\Product;
use App\Model\Collection;

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
        $products = Product::where('id','!=',0);
        foreach ($product as $key => $value) {
            if($key == 0)
                $products = $products->where('id',$value->meta_value);
            else
                $products = $products->orWhere('id',$value->meta_value);
        }

        $products = $products->get();


        $collection_id = Option::where('meta_key','collection')->get();

        $collections = Collection::where('id','!=',0);
        foreach ($collection_id as $key => $value) {
            $collections = $collections->orWhere('id',$value->meta_value);
        }

        $collections = $collections->get();
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

        $products_look = Product::where('id','!=',0);
        foreach ($product_look_id as $key => $value) {
            if($key == 0)
                $products_look = $products_look->where('id',$value->meta_value);
            else
                $products_look = $products_look->orWhere('id',$value->meta_value);
        }

        $products_look = $products_look->get();

       
        $products_look_gallery = Option::where('meta_key','product_look_gallery')->get();

        $look_title1 = Option::where('meta_key','look_title1')->get()->first();
        $look_title2 = Option::where('meta_key','look_title2')->get()->first();

        return view('client.home',compact('slides','products','collections','collection_gallery','collection_title','about_gallery','about_content','about_title2','about_title1','video_title1','video_title2','video_gallery','video','products_look','products_look_gallery','look_title2','look_title1'));


    }
}
