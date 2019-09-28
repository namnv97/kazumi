<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\User;
use App\Model\Product;
use App\Model\Article;


use Auth;

class AdminController extends Controller
{
	public $_data = [];

    public function index(){
    	$product = Product::where('status','<>',0)->count();
    	$article = Article::all()->count();
    	return view('server.index',compact('product','article'));
    }
}
