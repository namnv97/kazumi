<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoreRetailer;


use App\Model\Retailer;
use App\Model\City;

class RetailerController extends Controller
{
    public function index()
    {
        $retailers = Retailer::orderBy('created_at','desc')->paginate(10);
    	return view('server.retailers.index',compact('retailers'));
    }

    public function create()
    {
    	$cities = City::all();
    	return view('server.retailers.create',compact('cities'));
    }

    public function postCreate(StoreRetailer $request)
    {
        $req = $request->except('_token');

        $retailer = new Retailer();
        foreach($req as $field => $value):
            $retailer->$field = $value;
        endforeach;
        $retailer->save();

        return redirect()->route('admin.retailers.edit',['id' => $retailer->id])->with('msg','Thêm thành công');
    }

    public function edit($id = null)
    {
    	if($id == null) return redirect()->route('admin.retailers.index');

        $retailer = Retailer::find($id);

        if(empty($retailer)) return redirect()->route('admin.retailers.index');

        $cities = City::all();

    	return view('server.retailers.edit',compact('retailer','cities'));
    }

    public function postEdit(StoreRetailer $request,$id = null)
    {
        if($id == null) return redirect()->route('admin.retailers.index');

        $retailer = Retailer::find($id);

        if(empty($retailer)) return redirect()->route('admin.retailers.index');

        $req = $request->except('_token');
        foreach($req as $field => $value):
            $retailer->$field = $value;
        endforeach;
        $retailer->save();

        return redirect()->route('admin.retailers.edit',['id' => $id])->with('msg','Cập nhật thành công');
    }

    public function delete(Request $request)
    {

    }
}
