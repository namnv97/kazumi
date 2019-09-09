<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Tier;
use Validator;
class TierController extends Controller
{
    //
    public function index()
    {
    	$tiers = Tier::orderBy('created_at','desc')->paginate(10);
    	return view('server.tier.index',compact('tiers'));
    }

    public function create()
    {

    	return view('server.tier.create');
    }

    public function postCreate(Request $request)
    {
    	$validator = Validator::make($request->all(), [
            'name' => 'required',
            'title' => 'required',
        ],[
            'name.required' => 'Chưa nhập tên bậc',
            'title.required' => 'Chưa nhập tiêu đề bậc',
            
           
        ]);
        if ($validator->fails()) {
            return redirect('admin/tier/create')
                        ->withErrors($validator)
                        ->withInput();

        }

    	$tier = new Tier();
        $tier->name = $request->name;
        $tier->title = $request->title;
        
        $tier->tier_content = $request->tier_content;

        $tier->save();

       

        
        


         return redirect()->route('admin.tier.edit',['id' => $tier->id])->with('success','Thêm mới thành công');
    }

    public function edit($id)
    {
    	$tier = Tier::find($id);
    	return view('server.tier.edit',compact('tier'));
    }

    public function postEdit(Request $request,$id)
    {
    	$validator = Validator::make($request->all(), [
            'name' => 'required',
            'title' => 'required',
        ],[
            'name.required' => 'Chưa nhập tên bậc',
            'title.required' => 'Chưa nhập tiêu đề bậc',
            
           
        ]);
        if ($validator->fails()) {
            return redirect('admin/tier/edit/'.$id)
                        ->withErrors($validator)
                        ->withInput();

        }

    	$tier = Tier::find($id);
        $tier->name = $request->name;
        $tier->title = $request->title;
        
        $tier->tier_content = $request->tier_content;

        $tier->save();

         return redirect()->route('admin.tier.edit',['id' => $tier->id])->with('success','Cập nhật thành công');
    }

    public function delete($id = null)
    {
    	
    	$tier = Tier::find($id)->delete();
        return redirect()->route('admin.tier.index')->with('msg_del','Đã xóa bậc thưởng');
    }



}
