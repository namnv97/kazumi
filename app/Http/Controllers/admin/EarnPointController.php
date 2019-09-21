<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Earn_point;
use Validator;

class EarnPointController extends Controller
{
    //
    //
    public function index()
    {
    	$earn_point = Earn_point::orderBy('created_at','desc')->paginate(10);
    	return view('server.earn_point.index',compact('earn_point'));
    }
    public function create()
    {

    	return view('server.earn_point.create');
    }

    public function postCreate(Request $request)
    {
    	$validator = Validator::make($request->all(), [
            'title' => 'required',
            'point' => 'required',
            'image' => 'required',
        ],[
            'title.required' => 'Chưa nhập tên bậc',
            'point.required' => 'Chưa nhập số điểm',
           	'image.required' => 'Chưa có ảnh',
        ]);
        if ($validator->fails()) {
            return redirect()
                        ->route('admin.earn_point.create')
                        ->withErrors($validator)
                        ->withInput();

        }

    	$earn_point = new Earn_point();
        $earn_point->title = $request->title;
        $earn_point->unit = $request->unit;
        $earn_point->image = $request->image;
        $earn_point->point = $request->point;

        $earn_point->save();


         return redirect()->route('admin.earn_point.edit',['id' => $earn_point->id])->with('success','Thêm mới thành công');
    }

    public function edit($id)
    {
    	$earn_point = Earn_point::find($id);
    	return view('server.earn_point.edit',compact('earn_point'));
    }

    public function postEdit(Request $request,$id)
    {
    	$validator = Validator::make($request->all(), [
            'unit' => 'required',
            'title' => 'required',
            'point' => 'required',
            'image' => 'required',
        ],[
            'title.required' => 'Chưa nhập tên bậc',
            'unit.required' => 'Chưa nhập đơn vị',
            'point.required' => 'Chưa nhập số điểm',
           	'image.required' => 'Chưa có ảnh',
        ]);
        if ($validator->fails()) {
            return redirect('admin/earn_point/edit/'.$id)
                        ->withErrors($validator)
                        ->withInput();

        }


    	$earn_point = Earn_point::find($id);
        $earn_point->unit = $request->unit;
        $earn_point->title = $request->title;
        $earn_point->point = $request->point;
        $earn_point->image = $request->image;
        $earn_point->save();

        return redirect()->route('admin.earn_point.edit',['id' => $earn_point->id])->with('success','Cập nhật thành công');
    }

    public function delete($id = null)
    {
    	
    	$earn_point = Earn_point::find($id)->delete();
        return redirect()->route('admin.earn_point.index')->with('msg_del','Đã xóa điểm');
    }
    
}
