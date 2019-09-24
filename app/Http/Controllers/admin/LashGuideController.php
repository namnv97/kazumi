<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\Http\Requests\StoreStepCreate;
use App\Http\Requests\StoreStepEdit;
use App\Http\Requests\StoreLashGuide;

use App\Model\Product;
use App\Model\StepLash;
use App\Model\StepItem;
use App\Model\LashResult;
use App\Model\ResultProduct;


class LashGuideController extends Controller
{
	public function index(){
		$items = StepItem::orderBy('step_id','asc')->paginate(10);
		$steps = StepLash::orderBy('order','asc')->get();
		return view('server.lashguide.index',compact('items','steps'));
	}


	public function create(StoreLashGuide $request)
	{
		$step_item = new StepItem();
		$step_item->title = $request->title;
		$step_item->image = $request->image;
		$step_item->description = $request->description;
		$step_item->step_id = $request->step_id;
		$step_item->save();

		return redirect()->route('admin.lashguide.index')->with('msg','Thêm thành công');
	}

	public function edit(Request $request)
	{
		$id = $request->id;
		$item = StepItem::find($id);
		$steps = StepLash::orderBy('order','asc')->get();
		return view('server.lashguide.edit',compact('item','steps'));
	}

	public function postEdit(Request $request)
	{
		$id = $request->id;

		$item = StepItem::find($id);
		$item->title = $request->title;
		$item->image = $request->image;
		$item->description = $request->description;
		$item->step_id = $request->step_id;
		$item->save();

		return response()->json(['status' => 'success','msg' => 'Cập nhật thành công']);
	}

	public function delete(Request $request){
		$id = $request->id;

		$item = StepItem::find($id);

		$item->delete();

		return response()->json(['status' => 'success','msg' => 'Xóa thành công']);  
	}















	public function step_index()
	{
		$steps = StepLash::orderBy('order','asc')->get();
		return view('server.lashguide.step.index',compact('steps'));
	}

	public function step_create(StoreStepCreate $request)
	{
		$step = new StepLash();

		$req = $request->except('_token');

		foreach($req as $field => $value):
			$step->$field = $value;
		endforeach;

		$last = StepLash::orderBy('order','desc')->first();
		if(empty($last)):
			$step->order = 1;
		else:
			$step->order = $last->order + 1;
		endif;	


		$step->save();

		return redirect()->route('admin.lashguide.step.index')->with('msg',"Thêm bước thành công");
	}

	public function step_edit(Request $request)
	{
		$id = $request->id;

		$step = StepLash::find($id);

		return  view('server.lashguide.step.edit',compact('step'));
	}

	public function step_post_edit(Request $request)
	{
		$step = StepLash::find($request->id);

		if($step->slug != $request->slug)
		{
			$check = StepLash::where([
				['slug',$request->slug],
				['id','<>',$request->id]
			])
			->first();
			if(!empty($check)) return response()->json(['status' => 'error','msg' => 'Đường dẫn đã tồn tại']);
			else $step->slug = $request->slug;
		}

		$step->name = $request->name;
		$step->image = $request->image;
		$step->title = $request->title;
		$step->description = $request->description;
		$step->save();
		return response()->json(['status' => 'succss','msg' => 'Cập nhật thành công']);


	}

	public function step_order(Request $request)
	{
		$arr = $request->arr;

		if(!empty($arr)):
			foreach($arr as $ar):
				$step = StepLash::find($ar['id']);
				$step->order = $ar['order'];
				$step->save();
			endforeach;
			return response()->json(['status' => 'success']);
		else:
			return response()->json(['status' => 'error']);
		endif;
	}

	public function step_delete(Request $request)
	{
		$id = $request->id;

		$step = StepLash::find($id);

		$step->delete();

		return response()->json(['status' => 'success']);
	}










	public function result_index()
	{
		return view('server.lashguide.result.index');
	}

	public function result_create()
	{
		$products = Product::all();
		$steps = StepLash::orderBy('order','asc')->get();
		return view('server.lashguide.result.create',compact('steps','products'));
	}

	public function result_post_create(Request $request)
	{
		$req = $request->except('_token','product');

		ksort($req);

		$value = json_encode($req);

		$chk = LashResult::where('result_value','like',"%$value%")->first();

		if(!empty($chk)) return back()->withInput()->with('unique','Dữ liệu đã tồn tại');

		$result = new LashResult();
		$result->result_value = $value;
		$result->save();

		foreach($request->product as $product):
			$repro = new ResultProduct();
			$repro->result_id = $result->id;
			$repro->product_id = $product;
			$repro->save();
			unset($repro);
		endforeach;
		return redirect()->route('admin.lashguide.result.edit',['id' => $result->id])->with('msg','Thêm thành công');

	}

	public function result_edit($id = null)
	{
		if($id == null) return redirect()->route('admin.lashguide.result.index');

		echo 'sd';
	}

	public function result_post_edit(Request $request, $id = null)
	{
		if($id == null) return redirect()->route('admin.lashguide.result.index');
	}


}
