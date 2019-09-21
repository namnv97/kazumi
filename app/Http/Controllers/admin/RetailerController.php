<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoreRetailerCreate;
use App\Http\Requests\StoreRetailerEdit;

use App\Model\Retailer;
use App\Model\City;

class RetailerController extends Controller
{
    public function index()
    {
    	return view('server.retailers.index');
    }

    public function create()
    {
    	$cities = City::all();
    	return view('server.retailers.create',compact('cities'));
    }

    public function postCreate(StoreRetailerCreate $request)
    {

    }

    public function edit($id = null)
    {
    	if($id == null) return redirect()->route('admin.retailers.index');

    	return view('server.retailers.edit');
    }

    public function postEdit(StoreRetailerEdit $request)
    {

    }

    public function delete(Request $request)
    {

    }
}
