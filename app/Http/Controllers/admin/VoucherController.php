<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoreCreateVoucher;

use App\Model\Get_reward;

class VoucherController extends Controller
{
    public function index()
    {
    	$vouchers = Get_reward::orderBy('created_at','desc')->where('status',1)->paginate(10);
    	return view('server.discount.voucher',compact('vouchers'));
    }

    public function create(StoreCreateVoucher $request)
    {
    	$ji = $request->except('_token');
    	$reward = new Get_reward();
    	foreach($ji as $field => $value):
    		$reward->$field = $value;
    	endforeach;
    	$reward->save();
    	return redirect()->route('admin.voucher.index')->with('msg','Thêm thành công');
    }

    public function edit(Request $request)
    {
    	$id = $request->id;
    	$voucher = Get_reward::find($id);
    	return response()->json($voucher);
    }

    public function postEdit(StoreCreateVoucher $request)
    {
    	$id = $request->id;
    	$reward = Get_reward::find($id);
    	$reward->name = $request->name;
    	$reward->point = $request->point;
    	$reward->save();
    	return response()->json(['status' => 'success']);
    }

    public function delete(Request $request)
    {
    	$id = $request->id;

    	$reward = Get_reward::find($id);
    	$reward->status = 0;
    	$reward->save();

    	return response()->json(['status' => 'success']);
    }
}
