<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Get_reward;
use Validator;
class GetRewardController extends Controller
{
    //
    public function index()
    {
    	$get_reward = Get_reward::orderBy('created_at','desc')->paginate(10);
    	return view('server.get_reward.index',compact('get_reward'));
    }

    public function create()
    {

    	return view('server.get_reward.create');
    }

    public function postCreate(Request $request)
    {
    	$validator = Validator::make($request->all(), [
            'name' => 'required',
            'point' => 'required',
            'discount_value' => 'required',
            'image' => 'required'
            
        ],[
            'name.required' => 'Tiêu đề không được để trống',
            'point.required' => 'Điểm không được để trống',
            'discount_value.required' => 'Số tiền không được để trống',
            'image.required' => 'Ảnh không được để trống',
            
           
        ]);
        if ($validator->fails()) {
            return  back()
                    ->withErrors($validator)
                    ->withInput();

        }

    	$get_reward = new Get_reward();
        $get_reward->name = $request->name;
        $get_reward->point = $request->point;
        $get_reward->discount_value = $request->discount_value;
        $get_reward->image = $request->image;

        $get_reward->save();


         return redirect()->route('admin.get_reward.edit',['id' => $get_reward->id])->with('success','Thêm mới thành công');
    }

    public function edit($id)
    {
    	$get_reward = Get_reward::find($id);
    	return view('server.get_reward.edit',compact('get_reward'));
    }

    public function postEdit(Request $request,$id)
    {
    	$validator = Validator::make($request->all(), [
            'name' => 'required',
            'point' => 'required',
            'discount_value' => 'required',
            'image' => 'required'
            
        ],[
            'name.required' => 'Tiêu đề không được để trống',
            'point.required' => 'Điểm không được để trống',
            'discount_value.required' => 'Số tiền không được để trống',
            'image.required' => 'Ảnh không được để trống',
            
           
        ]);
        if ($validator->fails()) {
            return  back()
                    ->withErrors($validator)
                    ->withInput();

        }

        $get_reward = Get_reward::find($id);
        $get_reward->name = $request->name;
        $get_reward->point = $request->point;
        $get_reward->discount_value = $request->discount_value;
        $get_reward->image = $request->image;

        $get_reward->save();

         return redirect()->route('admin.get_reward.edit',['id' => $get_reward->id])->with('success','Cập nhật thành công');
    }

    public function delete($id = null)
    {
    	
    	$get_reward = Get_reward::find($id)->delete();
        return redirect()->route('admin.get_reward.index')->with('msg_del','Đã xóa phần thưởng');
    }
}
