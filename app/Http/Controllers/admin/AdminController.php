<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\User;
use App\Model\Product;
use App\Model\Article;
use App\Model\Cart;
use App\Model\Rating;
use App\Model\Retailer;


use Auth;

class AdminController extends Controller
{
	public $_data = [];

    public function index(){
    	$products = Product::where('status','<>',0)->orderBy('created_at','desc')->paginate(5);
    	$articles = Article::orderBy('created_at','desc')->paginate(5);
    	$carts = Cart::where('status','<>',0)->orderBy('created_at','desc')->paginate(5);
    	$cart_pending = Cart::where('status',0)->get()->count();
    	$users = User::orderBy('created_at','desc')->paginate(5);
    	$rates = Rating::where('status','publish')->orderBy('created_at','desc')->paginate(5);
    	$retailers = Retailer::orderBy('created_at','desc')->paginate(5);
    	return view('server.index',compact('products','articles','users','carts','cart_pending','rates','retailers'));
    }
}
