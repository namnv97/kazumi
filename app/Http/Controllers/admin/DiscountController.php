<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Discount;

use App\Http\Requests\StoreCreateDiscount;
use App\Http\Requests\StoreEditDiscount;

class DiscountController extends Controller
{
    public function index()
    {
        $discounts = Discount::orderBy('created_at','desc')->where('status',1)->paginate(10);
    	return view('server.discount.discount',compact('discounts'));
    }

    public function create(StoreCreateDiscount $request)
    {
        $req = $request->except('_token');
        $discount = new Discount();
        foreach($req as $field => $value):
            $discount->$field = $value;
        endforeach;
        $discount->save();
        return redirect()->route('admin.discount.index')->with('msg','Thêm mã giảm giá thành công');
    }

    public function edit(Request $request)
    {
        $id = $request->id;

        $discount = Discount::find($id);

        return response()->json([
            'id' => $discount->id,
            'code' => $discount->code,
            'description' => $discount->description,
            'type' => ($discount->type == 'percent')?'Phần trăm (%)':'Số tiền',
            'discount_value' => number_format($discount->discount_value),
            'date_end' => \Carbon\Carbon::parse($discount->date_end)->format('Y-m-d')
        ]);
    }

    public function postEdit(StoreEditDiscount $request)
    {

        $id = $request->id;

        $discount = Discount::find($id);
        $discount->description = $request->description;
        $discount->date_end = $request->date_end;
        $discount->save();

        return response()->json(['status' => 'success']);
    }

    public function delete(Request $request)
    {
    	$id = $request->id;

        $discount = Discount::find($id);
        $discount->status = 0;
        $discount->save();

        return response()->json(['status' => 'success']);
    }

    public function checkcode(Request $request)
    {
        $code = $request->code;

        $discount = Discount::where('code',$code)->first();

        if(!empty($discount)) return response()->json(['status' => true]);

        return response()->json(['status' => false]);
    }


}
