<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Rating;
use App\Model\Product;

class RatingController extends Controller
{
    public function index()
    {
    	$rates = Rating::orderBy('status','asc')->orderBy('created_at','desc')->paginate(10);
    	return view('server.rate.index',compact('rates'));
    }

    public function postEdit(Request $request)
    {
    	$id = $request->id;

    	$rate = Rating::find($id);

    	if(empty($rate)) return response()->json(['status' => 'errors','msg' => 'Đánh giá không tồn tại']);

    	$rate->status = 'publish';
    	$rate->save();
    	return response()->json(['status' => 'success','msg' => 'Đánh giá đã được duyệt']);
    }

    public function delete(Request $request)
    {
    	$id = $request->id;

    	$rate = Rating::find($id);

    	if(empty($rate)) return response()->json(['status' => 'errors', 'msg' => 'Đánh giá không tồn tại']);

    	$rate->delete();
    	$rate->save();

    	return response()->json(['status' => 'success','msg' => 'Đánh giá đã được xóa']);

    }


}
