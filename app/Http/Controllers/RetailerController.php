<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\City;
use App\Model\Retailer;

class RetailerController extends Controller
{
    public function search(Request $request)
    {
    	$name = $request->name;

    	$city = City::where('name',$name)->first();

    	return view('client.retailer.search',compact('city'));
    }
}
