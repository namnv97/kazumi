<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Cart;
use DB;

class OrderController extends Controller
{
    public function index(Request $request)
    {
    	$carts = Cart::orderBy('status','asc')
    	->orderBy('created_at','desc')
    	->select(DB::raw("CONCAT(first_name,' ',last_name) as fullname"),'carts.*')
    	->paginate(10);
    	return view('server.order.index',compact('carts'));
    }

    public function edit($id = null)
    {
    	if($id == null) return redirect()->route('admin.orders.index');

    	$cart = Cart::find($id);
    	dd($cart);
    }
}
