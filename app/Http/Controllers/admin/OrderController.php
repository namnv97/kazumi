<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Cart;
use DB;

use App\Http\Requests\StoreEditOrder;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        if(!empty($request->s)):
            $key = $request->s;
            if($request->status == 'all'):
                $carts = Cart::orderBy('status','asc')
                ->orderBy('created_at','desc')
                ->select(DB::raw("CONCAT(first_name,' ',last_name) as fullname"),'carts.*')
                ->where(DB::raw('CONCAT(first_name," ",last_name)'),'like',"%$key%")
                ->orWhere('phone',$key)
                ->paginate(10);
            else:
                $arr = [
                    'pending' => 0,
                    'ship_pending' => 1,
                    'shipping' => 2,
                    'complete' => 3,
                    'cancel' => 4
                ];
                $carts = Cart::orderBy('created_at','desc')
                ->select(DB::raw("CONCAT(first_name,' ',last_name) as fullname"),'carts.*')
                ->where([
                    [DB::raw('CONCAT(first_name," ",last_name)'),'like',"%$key%"],
                    ['status',$arr[$request->status]]
                ])
                ->orWhere('phone',$key)
                ->paginate(10);
            endif;
            $carts->withPath('?s='.$key.'&status='.$request->status);
        else:
        	$carts = Cart::orderBy('status','asc')
        	->orderBy('created_at','desc')
        	->select(DB::raw("CONCAT(first_name,' ',last_name) as fullname"),'carts.*')
        	->paginate(10);
        endif;
    	return view('server.order.index',compact('carts'));
    }

    public function edit($id = null)
    {
    	if($id == null) return redirect()->route('admin.orders.index');

    	$cart = Cart::find($id);
    	

        return view('server.order.edit',compact('cart'));
    }

    public function postEdit($id = null,StoreEditOrder $request)
    {
        if($id == null) return redirect()->route('admin.orders.index');
        
        $cart = Cart::find($id);

        $req = $request->except(['_token']);

        foreach($req as $field => $value):
            $cart->$field = $value;
        endforeach;

        $cart->save();

        return redirect()->route('admin.orders.edit',['id' => $id])->with('msg','Cập nhật thành công');
    }
}
