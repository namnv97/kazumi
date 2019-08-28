<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Auth;
use Carbon\Carbon;

use App\Http\Requests\StoreAddUser;

use Illuminate\Support\Facades\Validator;

use App\Model\Roles;
use App\Model\User;
use App\Model\Reward;
use App\Model\RoleUser;


class UserController extends Controller
{
    public function index()
    {
    	$roles = Roles::where('slug','<>','superadmin')->get();

    	$cur = User::find(Auth::user()->id);

    	if($cur->hasRole('superadmin')) $arr = ['admin','user'];
    	else $arr = ['user'];

    	$users = User::leftJoin('role_user','users.id','role_user.user_id')
    	->leftJoin('roles','roles.id','role_user.role_id')
    	->whereIn('roles.slug',$arr)->select('users.id','users.name','users.email','users.birthday','users.point_reward','users.refferal_code','roles.name as role_name')->paginate(5);

    	return view('server.user.index',compact('roles','users'));
    }

    public function postCreate(StoreAddUser $request)
    {

    	$user = new User();

    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->password = Hash::make($request->password);
        $user->refferal_code = str_random(10);
    	$user->point_reward = 100;
    	$user->save();



    	$roleuser = new RoleUser();
    	$roleuser->user_id = $user->id;
    	$roleuser->role_id = $request->role;
    	$roleuser->save();

    	$reward = new Reward();
    	$reward->user_id = $user->id;
    	$reward->point = 100;
    	$reward->action = "Tạo mới tài khoản";
    	$reward->status = 'approved';

    	$reward->save();

    	return redirect()->route('admin.user.index')->with('msg_add','Thêm người dùng thành công');

    }

    public function getUser(Request $request)
    {
        $id = $request->id;

    	if($id == null) return back();

        $user = User::leftJoin('role_user','role_user.user_id','users.id')
        ->leftJoin('roles','roles.id','role_user.role_id')
        ->where('users.id',$id)
        ->select('users.id','users.name','users.email','users.birthday','users.point_reward','users.refferal_code','roles.id as role_id')
        ->first()
        ->toArray();

    	return response()->json($user);


    }

    public function postEdit(Request $request)
    {
    	$vali = Validator::make($request->all(),
            [
                'name' => 'required',
                'role' => 'required|numeric|min:1'
            ],
            [
                'name.required' => 'Họ tên không được để trống',
                'role.required' => 'Kiểu người dùng không được để trống',
                'role.min' => 'Kiểu người dùng không được để trống'
            ]
        );

        if($vali->fails()) return response()->json(['status' => 'error','list' => $vali->errors()->all()]);

        

        $user = User::find($request->id);
        $user->name = $request->name;

        if(!empty($request->birthday)):
            $birthday = $request->birthday;
            $user->birthday = $birthday;
        endif;

        $user->save();

        $roleuser = RoleUser::where('user_id',$request->id)->first();
        $roleuser->role_id = $request->role;
        $roleuser->save();

        return response()->json(['status' => 'success','msg' => 'Cập nhật thành công']);
    }

    public function delete($id)
    {
    	echo 'Delete';
    }
}
