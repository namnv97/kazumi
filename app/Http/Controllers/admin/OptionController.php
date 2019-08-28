<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\Http\Requests\StoreOptionIndex;
use App\Http\Requests\StoreOptionFooter;

use App\Model\Option;

class OptionController extends Controller
{
    public function index()
    {
    	$logo = Option::where('meta_key','logo')->first();
    	return view('server.option.index',compact('logo'));
    }

    public function postIndex(StoreOptionIndex $request)
    {
		$logo = $request->logo;

		$option = Option::where('meta_key','logo')->first();

		if(!empty($option)):
			$option->meta_value = $logo;
			$option->save();
		else:
			$option = new Option();
			$option->meta_key = 'logo';
			$option->meta_value = $logo;
			$option->save();
		endif;

		return redirect()->route('admin.options.index')->with('msg','Các thiết lập đã được lưu');

    }

    public function footer()
    {
        $options = Option::where('meta_key','footer')->get();
    	return view('server.option.footer',compact('options'));
    }


    public function postFooter(StoreOptionFooter $request)
    {
        foreach($request->footer_title as $key => $rq):
            $arr[] = array(
                'title' => $rq,
                'content' => $request->footer_content[$key]
            );
        endforeach;

        $options = Option::where('meta_key','footer')->get();
        if(count($options) > 0):
            foreach($options as $op):
                $op->delete();
            endforeach;
        endif;

        foreach($arr as $result):
            $option = new Option();
            $option->name = "Nội dung Footer";
            $option->meta_key = 'footer';
            $option->meta_value = json_encode($result);
            $option->save();
        endforeach;

        return redirect()->route('admin.options.footer')->with('msg','Các thiết lập đã được lưu');
    }

    public function menu()
    {
        return view('server.option.menu');
    }

    public function postMenu(Request $request)
    {
        
    }

}
