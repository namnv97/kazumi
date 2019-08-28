<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAddColor;

use App\Model\Color;

class ColorController extends Controller
{
    public function index()
    {
    	$colors = Color::orderBy('created_at','desc')->paginate(10);
    	return view('server.color.index',compact('colors'));
    }

    public function create(StoreAddColor $request)
    {
    	$color = new Color;
    	$color->name = $request->name;
    	$color->image = $request->image;
    	$color->save();
    	return redirect()->route('admin.color.index')->with('msg_add','Add Color success');
    }

    public function delete($id)
    {
    	$color = Color::find($id);
    	$color->delete();
    	return redirect()->route('admin.color.index')->with('msg_del','Delete success');
    }
}
