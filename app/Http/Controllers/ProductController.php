<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($slug = null)
    {
    	if($slug == null) return redirect()->route('home');

    	$product = Product::where('slug',$slug)->first();
    	return view('client.product.index',compact('product'))
    }
}
