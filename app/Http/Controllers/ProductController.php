<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Cookie;

use App\Model\Product;

use App\Model\Rating;

use App\Model\Option;

use DB;

class ProductController extends Controller
{
    public function index($slug = null,Request $request)
    {
    	if($slug == null) return redirect()->route('home');

    	$product = Product::where('slug',$slug)->first();

    	$rating = Rating::leftJoin('users','users.id','rating.user_id')->select('rating.*','users.name as name')->where('product_id',$product->id)->orderBy('rating.created_at','desc')->paginate(10);

    	$rate_num = Rating::select(DB::raw("COUNT(id) as num,rate_star"))->groupBy('rate_star')->orderBy('rate_star','desc')->get()->toArray();

    	$relates = Product::where([
    		['id','<>',$product->id]
    	])
    	->take(4)->get();

    	$cok = $request->cookie('recent_view');

    	if(!empty($cok)):
    		$arr = json_decode($cok);
    		if(!in_array($product->id,$arr)):
    			$arr[] = $product->id;
    		endif;
		else:
			$arr = [$product->id];
		endif;

    	$res = json_encode($arr);

    	$cookie = cookie('recent_view', $res , 60*24*30);

    	$recents = Product::whereIn('id',$arr)->where('id','<>',$product->id)->get();

        $product_shipping = Option::where('meta_key','product_shipping')->first();


    	return response(view('client.product.index',compact('product','rating','rate_num','relates','recents','product_shipping')))->withCookie($cookie);

    }

    public function get_rate(Request $request)
    {
    	$page = $request->page;

    	$product_id = $request->product;

    	$rating = Rating::leftJoin('users','users.id','rating.user_id')->select('rating.*','users.name as name')->where('product_id',$product_id)->orderBy('rating.created_at','desc')->offset(($page-1)*10)->take(10)->get();
    	

    	return view('client.product.rating',compact('rating'));
    }
}
