<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\FormData;
use App\Model\RegisterMail;

class FormController extends Controller
{
    public function index(Request $request)
    {
    	$form_name = $request->form_name;

    	if(empty($form_name)) return view('server.form.index');

        if($form_name == 'register'):
            $forms = RegisterMail::orderBy('created_at','desc')->paginate(10);
        else:
        	$forms = FormData::where('form_name',$form_name)->orderBy('created_at','desc')->paginate(10);
        endif;
        $forms->withPath('?form_name='.$form_name);
    	$head_title = 'Form Data';


    	switch ($form_name) {
    		case 'contact':
    			$head_title = "Form Liên hệ";
    			break;
            case 'register':
                $head_title = "Form Đăng ký Email";
                break;
    	}

    	return view('server.form.index',compact('forms','head_title'));
    }


    public function delete(Request $request)
    {
        $id = $request->id;
        $form = FormData::find($id);
        if(empty($form)) return response()->json(['status' => 'error']);
        $form->delete();
        return response()->json(['status' => 'success']);
    }


}
