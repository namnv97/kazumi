<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\Model\Collection;
use App\Http\Requests\StoreAddCollection;
use App\Http\Requests\StoreEditCollection;

class CollectionController extends Controller
{
	public $_data = [];
    public function index()
    {
    	$cates = Collection::orderBy('created_at','desc')->get();
    	$lists = Collection::paginate(10);
    	return view('server.collection.index',compact('cates','lists'));
    }

    public function create(StoreAddCollection $request)
    {
    	$collection = new Collection;

    	$collection->name = $request->name;
    	$collection->slug = $request->slug;
    	$collection->description = $request->description;
    	if($request->parent > 0) $collection->parent = $request->parent;
    	$collection->save();
    	return redirect()->route('admin.collection.index')->with('msg_add','Thêm danh mục thành công');
    }

    public function getEdit(Request $rq)
    {
    	$id = $rq->id;
    	if($id == null) return;
    	$collection = Collection::find($id);
    	if(empty($collection)) return;
    	return response()->json($collection);
    }

    public function edit(StoreEditCollection $request)
    {
    	$id = $request->id;

    	if(empty($id)) return response()->json(['status' => 'warning','msg' => 'ID is required']);

    	$collection = Collection::find($id);

    	if(empty($collection)) return response()->json(['status' => 'warning','msg' => 'Collection not  found']);

    	$collection->name = $request->name;
    	$collection->slug = $request->slug;
    	$collection->description = $request->description;
    	if($request->parent > 0) $collection->parent = $request->parent;
    	else $collection->parent = null;

    	$collection->save();
    	return response()->json(['status' => 'success','msg' => 'Cập nhật danh mục thành công']);

    }

    public function delete($id)
    {
    	$collection = Collection::find($id);
    	$collection->delete();
    	return redirect()->route('admin.collection.index')->with('msg_delete','Collection Delete success');
    }
}
