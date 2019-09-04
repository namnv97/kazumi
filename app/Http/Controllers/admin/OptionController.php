<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\Http\Requests\StoreOptionIndex;
use App\Http\Requests\StoreOptionFooter;
use App\Http\Requests\StoreOptionMegamenu;

use App\Model\Option;
use App\Model\Product;
use App\Model\Page;
use App\Model\Article;
use App\Model\Collection;


class OptionController extends Controller
{
    public function index()
    {
    	$logo = Option::where('meta_key','logo')->first();
        $product_shipping = Option::where('meta_key','product_shipping')->first();
    	return view('server.option.index',compact('logo','product_shipping'));
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

        $shp = $request->product_shipping;

        $product_shipping = Option::where('meta_key','product_shipping')->first();

        if(!empty($product_shipping)):
            $product_shipping->meta_value = $shp;
            $product_shipping->save();
        else:
            $product_shipping = new Option();
            $product_shipping->meta_key = 'product_shipping';
            $product_shipping->meta_value = $shp;
            $product_shipping->save();
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
        $collections = Collection::all();
        $pages = Page::all();
        $products = Product::all();
        $articles = Article::all();
        $menus = Option::where('meta_key','menus')->first();
        return view('server.option.menu',compact('collections','pages','products','articles','menus'));
    }

    public function postMenu(Request $request)
    {
        Option::where('meta_key','menus')->delete();
        $op = new Option;
        $op->name = "Menu";
        $op->meta_key = 'menus';
        $op->meta_value = json_encode($request->data);
        $op->save();
        return response()->json(['status' => 'success', 'msg' => 'Lưu thành công']);
    }

    public function megamenu()
    {
        $arr = ['mega_menu','mega_product'];
        foreach($arr as $ar):
            $$ar = Option::where('meta_key',$ar)->get();
        endforeach;
        $products = Product::all();
        return view('server.option.megamenu',compact('mega_menu','mega_product','products'));

    }

    public function postMegamenu(StoreOptionMegamenu $request)
    {
        Option::whereIn('meta_key',['mega_menu','mega_product','mega_product_content'])->delete();
        foreach($request->mega_title as $key => $title):
            $op = new Option();
            $op->name = "Mega Menu";
            $op->meta_key = "mega_menu";
            $op->meta_value = json_encode(['title' => $title,'link'=>$request->mega_link[$key],'content' => $request->mega_content[$key]]);
            $op->save();
            unset($op);
        endforeach;
        foreach($request->mega_product as $key => $product):
            $op = new Option();
            $op->name = "Sản phẩm";
            $op->meta_key = "mega_product";
            $op->meta_value = json_encode(['id' => $product,'title' => $request->mega_product_title[$key],'note' => $request->mega_product_note[$key]]);
            $op->save();
            unset($op);
        endforeach;
        return redirect()->route('admin.options.megamenu')->with('msg',"Lưu thành công");
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
