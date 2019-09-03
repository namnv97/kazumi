<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\Http\Requests\StoreOptionIndex;
use App\Http\Requests\StoreOptionFooter;

use App\Model\Option;
use App\Model\Product;

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


    public function getHome()
    {
        $products = Product::all();
        return view('server.option.edithome',compact('products'));
    }

    public function postHome(Request $rq)
    {
        $option_slide = Option::where('meta_key','slide')->delete();
        foreach ($rq->gallery as $key => $value) 
        {
            $option = new Option;
            $option->name = 'slide';
            $option->meta_key = 'slide';
            $option->meta_value = $value;
            $option->save();
        }

        $option_slide = Option::where('meta_key','product')->delete();
        foreach ($rq->product_id as $key => $value) 
        {
            $option = new Option;
            $option->name = 'sản phẩm bán chạy';
            $option->meta_key = 'product';    
            $option->meta_value = $value; 
            $option->save();   
        }

        
        foreach ($rq->about_title1 as $key => $value) 
        {
            $option = new Option;
            $option->name = 'giơi thiệu tiêu đề 1';
            $option->meta_key = 'about_title1';
            $option->meta_value = $value['about_title1'];
            $option->save();

            $option = new Option;
            $option->name = 'giơi thiệu tiêu đề 2';
            $option->meta_key = 'about_title2';
            $option->meta_value = $rq->about_title2[$key];
            $option->save();

            $option = new Option;
            $option->name = 'nội dung giới thiệu';
            $option->meta_key = 'about_title2';
            $option->meta_value = $rq->about_content[$key];
            $option->save();

            $option = new Option;
            $option->name = 'ảnh giới thiệu';
            $option->meta_key = 'about_gallery';
            $option->meta_value = $$rq->gallery_about[$key];
            $option->save();
        }

        $option = new Option;
        $option->name = 'video';
        $option->meta_key = 'video';    
        $option->meta_value = $rq->video; 
        $option->save();

        $option = new Option;
        $option->name = 'video';
        $option->meta_key = 'video';    
        $option->meta_value = $rq->video; 
        $option->save();

        $option = new Option;
        $option->name = 'video';
        $option->meta_key = 'video';    
        $option->meta_value = $rq->video; 
        $option->save();

        $option = new Option;
        $option->name = 'video';
        $option->meta_key = 'video';    
        $option->meta_value = $rq->video; 
        $option->save();
        // //
        // foreach ($rq->product_id_look as $key => $value) 
        // {
        //     $option = new Option;
        //     $option->name = 'sản phẩm hot';
        //     $option->meta_key = 'product_look';    
        //     $option->meta_value = $value; 
        //     $option->save();   
        // } 

        // foreach ($rq->gallery_look as $key => $value) 
        // {
        //     $option = new Option;
        //     $option->name = 'ảnh sản phẩm hot';
        //     $option->meta_key = 'gallery_look';    
        //     $option->meta_value = $value; 
        //     $option->save();   
        // }     
    }

}
