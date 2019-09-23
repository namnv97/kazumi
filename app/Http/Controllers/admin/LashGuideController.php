<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LashGuideController extends Controller
{
    public function index(){
    	return view('server.lashguide.index');
    }
















    public function step_index()
    {
    	return view('server.lashguide.step.index');
    }
}
