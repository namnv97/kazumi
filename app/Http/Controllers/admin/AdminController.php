<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\User;
use Auth;

class AdminController extends Controller
{
	public $_data = [];

    public function index(){
    	$user = User::find(Auth::user()->id);
    	$this->_data['user'] = $user;
    	return view('server.index',$this->_data);
    }
}
