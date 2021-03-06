<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Cookie;

use App\Model\Product;
use App\Model\Rating;
use App\Model\Option;
use App\Model\Essential;
use App\Model\History_reward;
use DB;
use Auth;

class ProductController extends Controller
{
    public function index($slug = null,Request $request)
    {
    	if($slug == null) return redirect()->route('home');

    	$product = Product::where('slug',$slug)->first();

    	$rating = Rating::leftJoin('users','users.id','rating.user_id')->select('rating.*','users.name as name')->where('product_id',$product->id)->orderBy('rating.created_at','desc')->paginate(10);

    	$rate_num = Rating::where('product_id',$product->id)
        ->select(DB::raw("COUNT(id) as num,rate_star"))
        ->groupBy('rate_star')
        ->orderBy('rate_star','desc')
        ->get()
        ->toArray();

    	$relates = Product::where([
    		['id','<>',$product->id]
    	])
    	->take(4)->get();

    	$cok = $request->cookie('recent_view');

    	if(!empty($cok)):
    		$arr = json_decode($cok,true);
            foreach($arr as $key => $ar):
                if($ar == $product->id) unset($arr[$key]);
            endforeach;
            $arr[] = $product->id;
		else:
			$arr = [$product->id];
		endif;


    	$res = json_encode($arr);

    	$cookie = cookie('recent_view', $res , 60*24*30);

    	$recents = Product::whereIn('id',$arr)->where('id','<>',$product->id)->get();

        $product_shipping = Option::where('meta_key','product_shipping')->first();

        $essentials = Essential::leftJoin('products','essentials.essential_product_id','products.id')->where('essentials.product_id',$product->id)->get();

        if(Auth::check()):
            $cur = Rating::where([
                ['user_id', Auth::user()->id],
                ['product_id',$product->id]
            ])
            ->first();
            $is_rate = (empty($cur))?true:false;
        else:
            $is_rate = true;
        endif;

        $afshipping = Option::where('meta_key','afshipping')->first();
        $af_content = Option::where('meta_key','af_content')->first();
        $af_attr = Option::where('meta_key','af_attr')->get();


    	return response(view('client.product.index',compact('product','rating','rate_num','essentials','relates','recents','product_shipping','is_rate','afshipping','af_content','af_attr')))->withCookie($cookie);

    }

    public function get_rate(Request $request)
    {
    	$page = $request->page;

    	$product_id = $request->product;

    	$rating = Rating::leftJoin('users','users.id','rating.user_id')->select('rating.*','users.name as name')->where('product_id',$product_id)->orderBy('rating.created_at','desc')->offset(($page-1)*10)->take(10)->get();
    	

    	return view('client.product.rating',compact('rating'));
    }

    public function create_rate(Request $request)
    {
        $req = $request->except('_token');

        $chk = Rating::where([
            ['user_id',Auth::user()->id],
            ['product_id',$request->id]
        ])
        ->first();

        if(!empty($chk)) return;

        $rate = new Rating();
        $rate->user_id = Auth::user()->id;
        $rate->product_id =  $request->id;
        $rate->title = $request->review_title;
        $rate->comment = $request->review_content;
        $rate->rate_star = $request->rate_star;
        $rate->save();

        $product = Product::find($request->id);

        $reward = new History_reward();
        $reward->user_id = Auth::user()->id;
        $reward->action = 'Bình luận bài viết <a href="'.route('client.product.index',['slug' => $product->slug]).'" style="color: blue;" target="_blank">'.$product->name.'</a>';
        $reward->point = 100;
        $reward->status = 'approved';
        $reward->save();

        $rating = Rating::leftJoin('users','users.id','rating.user_id')
        ->select('rating.*','users.name as name')
        ->where('product_id',$request->id)
        ->orderBy('rating.created_at','desc')
        ->paginate(10);

        $rate_num = Rating::where('product_id',$request->id)
        ->select(DB::raw("COUNT(id) as num,rate_star"))
        ->groupBy('rate_star')
        ->orderBy('rate_star','desc')
        ->get()
        ->toArray();
        if(Auth::check()):
            $cur = Rating::where([
                ['user_id', Auth::user()->id],
                ['product_id',$request->id]
            ])
            ->first();
            $is_rate = (empty($cur))?true:false;
        else:
            $is_rate = true;
        endif;
        return view('client.product.comment',compact('rating','rate_num','is_rate'));

    }
}
