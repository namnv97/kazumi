<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Get_reward;
use App\Model\Voucher;
use App\Model\Reward;

use Auth;

class VoucherController extends Controller
{
    public function create(Request $request)
    {
    	$id = $request->id;

    	$gre = Get_reward::find($id);

    	$voucher = new Voucher();
    	$voucher->user_id = Auth::user()->id;
    	$voucher->code = str_random(10);
    	$voucher->name = $gre->name;
    	$voucher->discount_value = $gre->discount_value;
    	$voucher->save();

    	$reward = new Reward();
    	$reward->user_id = Auth::user()->id;
    	$reward->point = $gre->point*-1;
    	$reward->action = "Đổi ".$gre->name;
    	$reward->status = 'approved';
    	$reward->save();

    	return response()->json(['status' => 'success']);

    }
}
