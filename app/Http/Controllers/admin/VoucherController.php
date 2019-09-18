<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VoucherController extends Controller
{
    public function index()
    {
    	return view('server.discount.voucher');
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
