<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \File;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

use App\Model\FormData;
use App\Model\RegisterMail;

class FormController extends Controller
{
   	public function formdata(Request $request)
   	{
   		if(empty($request->form_name)) return response()->json(['status' => 'errors','msg' => "Quá trình gửi lỗi. Vui lòng kiểm tra lại"]);
   		$form_name = $request->form_name;
   		switch ($form_name) {
   			case 'contact':
   				return $this->contact($request);
   				break;
            case 'register':
               return $this->register($request);
               break;
            case 'program':
               return $this->program($request);
               break;
            case 'retail':
               return $this->retail($request);
               break;
   		}
   	}

   	public function contact(Request $request)
   	{
   		$req = $request->only(['name','email','phone','message']);

         $req['ip'] = $_SERVER['REMOTE_ADDR'];

   		$form = new FormData();

   		$form->form_name = 'contact';

   		$form->form_value = json_encode($req);

         $form->ip = $req['ip'];

   		$form->save();

   		return response()->json(['status' => 'success','msg' => 'Form đã được gửi thành công. Xin cảm ơn']);
   	}

      public function register(Request $request)
      {
         $ck = 0;

         $mali = RegisterMail::where('email',$request->email)->first();

         if(!empty($mali)) return response()->json(['status' => 'error','msg' => 'Email đã được đăng ký trước đó']);

         $mapi = RegisterMail::where('ip',$_SERVER['REMOTE_ADDR'])->orderBy('created_at','desc')->first();
         $last = 0;

         if(!empty($mapi)) $last = \Carbon\Carbon::parse($mapi->created_at)->format('U');

         $now = time();

         if(($now - $last) < 300)
         {
            $cur = 300 - $now + $last;
            $time = (floor($cur/60)).':'.(($cur%60 < 10)?'0'.($cur%60):($cur%60));
            return response()->json(['status' => 'error','msg' => 'Vui lòng thử lại sau '.$time.' phút']);
         }


         $form = new RegisterMail();
         $form->email = $request->email;
         $form->ip = $_SERVER['REMOTE_ADDR'];
         $form->save();
         return response()->json(['status' => 'success','msg' => 'Đăng ký thành công !']);
      }

      public function program(Request $request)
      {
         $req = $request->except(['_token','certificate','form_name']);
         if($request->hasFile('certificate')):
            $file = $request->certificate;
            $format = $file->extension();
            if(!in_array($format,['doc','docx','pdf'])) return response()->json(['status' => 'error','msg' => 'File sai định dạng cho phép']);
            $name = $file->getClientOriginalName();
            $name = preg_replace('/\.(.*)$/', '_' . time() . '.$1', $name);
            $file->move(public_path('assets/client/img'), $name);
            $req['certificate'] = '/assets/client/img/certificate/'.$name; 
         endif;
         $form = new FormData();
         $form->form_name = $request->form_name;
         $form->form_value = json_encode($req);
         $form->ip = $_SERVER['REMOTE_ADDR'];
         $form->save();

         return response()->json(['status' => 'success','msg' => 'Gửi thành công']);
      }

      public function retail(Request $request)
      {
         $req = $request->except(['_token','form_name']);
         $form = new FormData();
         $form->form_name = 'retail';
         $form->form_value = json_encode($req);
         $form->ip = $_SERVER['REMOTE_ADDR'];
         $form->save();
         return response()->json(['status' => 'success','msg' => 'Đăng ký thành công']);
      }


}
