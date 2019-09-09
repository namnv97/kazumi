<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


use App\Model\User;
use App\Model\RoleUser;
use App\Model\Roles;
use Auth;
use Validator;
use Mail;

class AccountController extends Controller
{
    //

    public function getLogin()
    {
        if(Auth::check()) return $this->redirect();

    	return view('client.account.login');
    }

    public function postLogin(Request $rq)
    {
    	$validator = Validator::make($rq->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required|min:6',
        ],[
    		'email.required' => 'Chưa nhập email',

    		'email.email' => 'Không đúng định dạng',
    		'email.max' => 'Email phải nhỏ hơn 255 ký tự',
    		'password.required' => 'Chưa nhập mật khẩu',
    		'password.required' => 'Mật khẩu không nhỏ hơn 6 ký tự',

        ]);

        if ($validator->fails()) {
            return redirect()
                        ->route('client.account.login')
                        ->withErrors($validator)
                        ->withInput();
        }

    	if (Auth::attempt(['email' => $rq->email, 'password'=>$rq->password])) 
    	{
            return $this->redirect();
        }
        else
        {
            return redirect()
                        ->route('login')
                        ->withErrors(['email hoặc mật khẩu không đúng']);
        }
    }


    public function getRegister()
    {
        if(Auth::check()) return $this->redirect();
    	return view('client.account.register');
    }

    public function postRegister(Request $rq)
    {
    	$validator = Validator::make($rq->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|required_with:repassword|same:repassword',
            'name' => 'required',
            'repassword' => 'required|'
        ],[
    		'email.required' => 'Chưa nhập email',

    		'email.email' => 'Không đúng định dạng',
    		'email.max' => 'Email phải nhỏ hơn 255 ký tự',
    		'password.required' => 'Chưa nhập mật khẩu',
    		'password.required' => 'Mật khẩu không nhỏ hơn 6 ký tự',
    		'password.required_with' => 'Xác nhận mật khẩu không khớp với mật khẩu',
    		'password.same' => 'Xác nhận mật khẩu không khớp với mật khẩu',
    		'repassword.required' => 'Chưa nhập xác nhận mật khẩu',
    		'name.required' => 'Chưa nhập họ tên',
        ]);

        if ($validator->fails()) {
            return redirect()
                        ->route('client.account.register')
                        ->withErrors($validator)
                        ->withInput();
        }

        $user = new User;
        $user->name = $rq->name;
        $user->email = $rq->email;
        $user->point_reward = 100;
        $user->refferal_code = strtoupper(str_random(10));
        $user->password = Hash::make($rq->password);
        $user->save();

        $user_role = new RoleUser;
        $user_role->user_id = $user->id;
        $user_role->role_id = 3;
        $user_role->save();

        $reward = new Reward();
        $reward->user_id = $user->id;
        $reward->point = 100;
        $reward->action = "Đăng ký tài khoản";
        $reward->status = 'approved';
        $reward->save();

        return redirect()->route('login')->with('success','Đăng ký thàng công!');

    }

    public function getForgot()
    {
    	return view('client.account.forgotpassword');
    }

    public function postForgot(Request $rq)
    {
    	$validator = Validator::make($rq->all(), [
            'email' => 'required|max:255',
            
        ],[
    		'email.required' => 'Chưa nhập email',

    		
    		'email.max' => 'Email phải nhỏ hơn 255 ký tự',
    		
        ]);

        if ($validator->fails()) {
            return redirect('account/forgot_password')
                        ->withErrors($validator)
                        ->withInput();
        }

        $pass = 'kh'.time();

        $user = User::where('email',$rq->email)->first();
        if(empty($user))
        	return redirect('account/forgot_password')
                        ->withErrors(['Không tồn tại tài khoản này trên hệ thống']);
        $user->password = Hash::make($pass);
        $user->save();
        Mail::send('client.account.mail', array('password'=>$pass,'email'=>$rq->email), function($message){
	        $message->to('namnguyen.pveser@gmail.com', 'Mật Khẩu Mới')->subject('Cấp lại mật khẩu!');
	    });

        return redirect()->route('login')->with('success','Gửi yêu cầu lấy lại mật khẩu thành công! Vui lòng kiểm tra email của bạn');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function redirect()
    {
        if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('superadmin')) return redirect()->route('admin.dashboard');
        return redirect('/');
    }


    public function index()
    {
        $user = Auth::user();
        return view('client.account.index',compact('user'));
    }

    public function reward()
    {
        return view('client.account.reward_account');
    }
}
