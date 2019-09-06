<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\FormData;

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
   		}
   	}

   	public function contact(Request $request)
   	{
   		$req = $request->only(['name','email','phone','message']);

         $req['ip'] = $_SERVER['REMOTE_ADDR'];

   		$form = new FormData();

   		$form->form_name = 'contact';

   		$form->form_value = json_encode($req);

   		$form->save();

   		return response()->json(['status' => 'success','msg' => 'Form đã được gửi thành công. Xin cảm ơn']);
   	}

      public function register(Request $request)
      {
         $data = ['email' => $request->email,'ip' => $_SERVER['REMOTE_ADDR']];
         $form = new FormData();
         $form->form_name = 'register';
         $form->form_value = json_encode($data);
         $form->save();
         return response()->json(['status' => 'success','msg' => 'Form đã được gửi thành công. Xin cảm ơn']);
      }
}
