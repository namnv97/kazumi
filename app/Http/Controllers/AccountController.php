<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use \Carbon\Carbon;
use \File;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;


use App\Model\User;
use App\Model\RoleUser;
use App\Model\Roles;
use App\Model\Reward;
use App\Model\Option;
use App\Model\UserTier;
use App\Model\Tier;
use App\Model\Get_reward;
use App\Model\Earn_point;
use App\Model\History_reward;
use App\Model\Cart;
use App\Model\CartItem;
use App\Model\RegisterMail;
use App\Model\Voucher;
use App\Model\UserRef;

use Auth;
use Validator;
use Mail;
use DB;

class AccountController extends Controller
{
    public function __construct()
    {
        \Carbon\Carbon::setLocale('vi_VN');
    }

    public function getLogin()
    {
        if(Auth::check()) return $this->redirect();

    	return view('client.account.login');
    }

    public function postLogin(Request $rq)
    {
    	$validator = Validator::make($rq->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required|min:8',
        ],[
    		'email.required' => 'Email không được để trống',
    		'email.email' => 'Sai định dạng Email',
    		'email.max' => 'Email tối đa 255 ký tự',
    		'password.required' => 'Mật khẩu không được để trống',
    		'password.min' => 'Mật khẩu tối thiểu :min ký tự',

        ]);

        if ($validator->fails()) {
            return redirect()
                        ->route('login',['href' => request()->href])
                        ->withErrors($validator)
                        ->withInput();
        }

    	if (Auth::attempt(['email' => $rq->email, 'password'=>$rq->password],true)) 
    	{
            return $this->redirect();
        }
        else
        {
            return redirect()
                        ->route('login',['href' => request()->href])
                        ->withErrors(['Email hoặc Mật khẩu không đúng'])
                        ->withInput();
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
                        ->route('client.account.register',['href' => request()->href])
                        ->withErrors($validator)
                        ->withInput();
        }

        $user = new User;
        $user->name = $rq->name;
        $user->email = $rq->email;
        $user->point_reward = 100;
        $ref = strtoupper(str_random(10));
        $user->refferal_code = $ref;
        $user->short_link = $this->bitly(route('home',['ref' => $ref]));
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

        $tier = new UserTier();
        $tier->user_id = $user->id;
        $tier->tier_id = 1;
        $tier->save();

        if(isset($rq->refferal_code)):
            $us = User::where('refferal_code',$rq->refferal_code)->first();
            if(!empty($us)):
                $reff = new UserRef();
                $reff->user_id = $us->id;
                $reff->user_ref = $user->id;
                $reff->save();
            endif;
        endif;

        return redirect()->route('login',['href' => request()->href])->with(['success'=>'Đăng ký thàng công!','msg_ref' => true]);

    }

    public function bitly($link){
        $url = 'https://api-ssl.bitly.com/v4/bitlinks';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['long_url' => "$link"])); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer b84b3e4ce2ed626fb6bc787775114fc1a17cf5d2",
            "Content-Type: application/json"
        ]);

        $arr_result = json_decode(curl_exec($ch));
        if(isset($arr_result->link)) return $arr_result->link;
        return null;
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
        if(isset(request()->href) && !empty(request()->href)) return redirect(request()->href);
        if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('superadmin')) return redirect()->route('admin.dashboard');
        return redirect('/');
    }
    

    public function index()
    {
        $user = Auth::user();


        $cart = Cart::where('user_id',$user->id)->select(DB::raw("CONCAT(first_name,' ',last_name) as fullname,CONCAT(address1,', ',address2,', ',city) as address"),'carts.*')->orderBy('created_at','desc')->get();



        return view('client.account.index',compact('user','cart'));
    }

    public function reward()
    {
        $rewards = Reward::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->get();

        $reward_help = Option::where('meta_key','reward_help')->first();

        $grades = Tier::all();

        $user_tier = UserTier::where('user_id',Auth::user()->id)->first();

        $earn_point = Earn_point::all();

        $get_reward = Get_reward::orderBy('created_at','desc')->get();

        $vouchers = Voucher::where('status',1)->orderBy('created_at','desc')->get();

        return view('client.account.reward_account',compact('rewards','reward_help','grades','user_tier','earn_point','get_reward','vouchers'));
    }

    public function getProfile()
    {
        $user = Auth::user();
        return view('client.account.profile',compact('user'));
    }

    public function postProfile(Request $rq)
    {
        $validator = Validator::make($rq->all(), [
            'birthday' => 'required',
            'name' => 'required',
        ],[
            'birthday.required' => 'Chưa nhập ngày sinh',

            'name.required' => 'Chưa nhập họ tên',
            

        ]);

        if ($validator->fails()) {
            return redirect('account/profile')
                        ->withErrors($validator)
                        ->withInput();
        }
        $user = User::find(Auth::user()->id);
        $user->name = $rq->name;
        $user->birthday = $rq->birthday;
        $user->name = $rq->name;
        if($rq->hasFile('avatar')):
            if(file_exists(public_path().$user->avatar)):
                File::delete(public_path().$user->avatar);
            endif;
            $file = $rq->avatar;
            $format = $file->extension();
            $name = $file->getClientOriginalName();
            $name = preg_replace('/\.(.*)$/', '_' . time() . '.$1', $name);

            $file->move(public_path('assets/client/img'), $name);
            $user->avatar = '/assets/client/img/'.$name;
        endif;
        if(!empty($rq->password)):
            $user->password = Hash::make($rq->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login');
        else:
            $user->save();
            return redirect('account/profile')->with('success','Cập nhật thành công');
        endif;
    }

    

    public function getReward()
    {
        $history = History_reward::where('user_id',Auth::user()->id)->get();
        $earn_point = Earn_point::all();
        $rewards = Get_reward::orderBy('reward','asc')->get();
        return view('client.account.getreward',compact('rewards','earn_point','history'));
    }
    public function postReward(Request $rq)
    {
       $user = User::find(Auth::user()->id);
       $reward = Get_reward::find($rq->id);

       if($user->point_reward >= $reward->point)
       {
            $user->point_reward -= $reward->point;
            $user->save();

            //luu lai lich su
            $ht = new History_reward;
            $ht->user_id = $user->id;
            $ht->point = -$reward->point;
            $ht->action = "Đổi quà tặng";
            $ht->status = "approved";
            $ht->save();
            $json_data = [
                'status' => 1,
                'msg' => 'Đổi thưởng thành công'
            ];
            echo json_encode($json_data); 
       }
       else
       {
            $json_data = [
                'status' => 0,
                'msg' => 'Đổi thưởng không thành công'
            ];
            echo json_encode($json_data); 
       }
    }


    public function postDataEarn(Request $rq)
    {
        $er = Earn_point::find($rq->id);

        $json_data = [
                
                'data' => $er
            ];
        echo json_encode($json_data); 


    }

    public function get_order_detail(Request $request)
    {
        $id =$request->id;

        $carts = CartItem::where('cart_id',$id)->get();

        $cart = Cart::find($id);

        return view('client.account.order_detail',compact('carts','cart'));
    }


    public function get_earn_point_part(Request $request)
    {
        $key_code = $request->key_code;

        $earn = Earn_point::where('key_code',$key_code)->first();
        if($key_code == 'instagram')
        {
            $instagram = Option::where('meta_key','instagram')->first();
            return view('client.account.earn_part',compact('earn','instagram'));
        }

        return view('client.account.earn_part',compact('earn'));
    }

    public function update_birthday(Request $request)
    {
        $birthday = $request->birthday;
        $user = User::find(Auth::user()->id);
        $user->birthday = $birthday;
        $user->save();


        $earn = Earn_point::where('key_code','birthday')->first();

        $now = Carbon::now();

        $curyear_bd = Carbon::createFromFormat('Y-m-d', $birthday)->setYear($now->year);
        $now > $curyear_bd->endOfDay() ? $next_bd = $curyear_bd->addYear(1) : $next_bd = $curyear_bd;

        $date = $now->diffInDays($next_bd);

        $msg = ($date > 0)?'<p>Saved! Bạn sẽ nhận được '.$earn->point.' điểm sau '.$date.' ngày</p>':'Chúc mừng sinh nhật';

        return response()->json(['status' => 'success','msg' => $msg]);
    }


    public function signup_point()
    {
        $chk = History_reward::where([
            ['action','Đăng ký Email'],
            ['user_id',Auth::user()->id]
        ])
        ->first();
        if(!empty($chk)):
            return response()->json(['status' => 'errors','msg' => 'Bạn đã nhận  phần thưởng này. Xin cảm ơn']);
        endif;
        $earn = Earn_point::where('key_code','signup')->first();
        $reward = new History_reward();
        $reward->user_id = Auth::user()->id;
        $reward->point = $earn->point;
        $reward->action = $earn->title;
        $reward->status = 'approved';
        $reward->save();

        $user = User::find(Auth::user()->id);
        $user->point_reward += $earn->point;
        $user->save();

        $reg = RegisterMail::where('email',Auth::user()->email)->first();

        if(empty($reg)):
            $reg = new RegisterMail();
            $reg->email = Auth::user()->email;
            $reg->ip = $_SERVER['REMOTE_ADDR'];
            $reg->save();
        endif;

        return response()->json(['status' => 'success','msg' => '<p>Đăng ký thành công. Email của bạn đã được thêm vào danh sách ưu tiên thông báo</p>']);
    }

    public function likefacebook()
    {
        $chk = History_reward::where([
            ['action','Like trang Facebook'],
            ['user_id',Auth::user()->id]
        ])
        ->first();
        if(!empty($chk)):
            return response()->json(['status' => 'errors','msg' => 'Bạn đã nhận  phần thưởng này. Xin cảm ơn']);
        endif;
        $earn = Earn_point::where('key_code','facebook')->first();
        $reward = new Reward();
        $reward->user_id = Auth::user()->id;
        $reward->point = $earn->point;
        $reward->action = $earn->title;
        $reward->status = 'approved';
        $reward->save();

        $user = User::find(Auth::user()->id);
        $user->point_reward += $earn->point;
        $user->save();

        return response()->json(['status' => 'success','msg' => 'Cảm ơn bạn đã thích chúng tôi trên Facebook']);
    }

    public function followinstagram()
    {
        $chk = History_reward::where([
            ['action','Theo dõi Instagram'],
            ['user_id',Auth::user()->id]
        ])
        ->first();
        if(!empty($chk)):
            return response()->json(['status' => 'errors','msg' => 'Bạn đã nhận  phần thưởng này. Xin cảm ơn']);
        endif;
        $earn = Earn_point::where('key_code','instagram')->first();
        $reward = new Reward();
        $reward->user_id = Auth::user()->id;
        $reward->point = $earn->point;
        $reward->action = $earn->title;
        $reward->status = 'approved';
        $reward->save();

        $user = User::find(Auth::user()->id);
        $user->point_reward += $earn->point;
        $user->save();

        return response()->json(['status' => 'success','msg' => 'Cảm ơn bạn đã theo dõi chúng tôi']);
    }



    public function generate_voucher(Request $request)
    {

    }


}
