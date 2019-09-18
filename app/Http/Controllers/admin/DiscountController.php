<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiscountController extends Controller
{
    public function index()
    {
    	return view('server.discount.discount');
    }

    public function create(Request $request)
    {

    }

    public function edit(Request $request)
    {

    }

    public function postEdit(Request $request)
    {

    }

    public function delete(Request $request)
    {
    	
    }
}
