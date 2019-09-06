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
use Validator;

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
        $collections = Collection::all();
        $slide = Option::where('meta_key','slide')->get();
        $product = Option::where('meta_key','product')->get();
        $about_title1 = Option::where('meta_key','about_title1')->get();
        $about_title2 = Option::where('meta_key','about_title2')->get();
        $about_gallery = Option::where('meta_key','about_gallery')->get();
        $about_content = Option::where('meta_key','about_content')->get();
        $video = Option::where('meta_key','video')->get()->first();
        $video_title1 = Option::where('meta_key','video_title1')->get()->first();
        $video_title2 = Option::where('meta_key','video_title2')->get()->first();
        $video_gallery = Option::where('meta_key','video_gallery')->get()->first();
        $product_look_product = Option::where('meta_key','product_look_product')->get();
        $product_look_gallery = Option::where('meta_key','product_look_gallery')->get();
        $collection = Option::where('meta_key','collection')->get();
        $collection_gallery = Option::where('meta_key','collection_gallery')->get();
        $collection_title = Option::where('meta_key','collection_title')->get();
        $look_title1 = Option::where('meta_key','look_title1')->get()->first();
        $look_title2 = Option::where('meta_key','look_title2')->get()->first();

        
        return view('server.option.edithome',compact('products','collections','slide','product','about_title1','about_title2','about_gallery','about_content','video','video_title1','video_title2','video_gallery','product_look_product','product_look_gallery','collection','collection_gallery','collection_title','look_title1','look_title2'));
    }

    public function postHome(Request $rq)
    {
        $validator = Validator::make($rq->all(), [
            'gallery' => 'required',
            'product_id' => 'required',
            'about_title1' => 'required',
            'about_title2' => 'required',
            'about_gallery' => 'required|image',
            'video' => 'required',
            'video_title1' => 'required',
            'video_title2' => 'required',
            'video_gallery' => 'required',
            'product_look_product' => 'required',
            'product_look_gallery' => 'required',

            'collecttion' => 'required',
            'gallery_col' => 'required',
            'collection_title' => 'required',
            'look_title1' => 'required',
            'look_title2' => 'required',
            

        ],[
            'gallery.required' => 'Chưa nhập ảnh nền',
            'about_title1.required' => 'Chưa nhập tiêu đề giới thiệu 1',
            'about_title2.required' => 'Chưa nhập tiêu đề giới thiệu 2',
            'about_gallery.required' => 'Chưa nhập ảnh nền giới thiệu',
            'video.required' => 'Chưa nhập link video'
        ]);
        if ($validator->fails()) {
            return redirect('admin/options/home')
                        ->withErrors($validator)
                        ->withInput();
        }
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

        $option_slide = Option::where('meta_key','about_title1')->delete();
        $option_slide = Option::where('meta_key','about_title2')->delete();
        $option_slide = Option::where('meta_key','about_gallery')->delete();
        $option_slide = Option::where('meta_key','about_content')->delete();
        foreach ($rq->about_title1 as $key => $value) 
        {
            $option = new Option;
            $option->name = 'giơi thiệu tiêu đề 1';
            $option->meta_key = 'about_title1';
            $option->meta_value = $value;
            $option->save();

            $option = new Option;
            $option->name = 'giơi thiệu tiêu đề 2';
            $option->meta_key = 'about_title2';
            $option->meta_value = $rq->about_title2[$key];
            $option->save();

            $option = new Option;
            $option->name = 'nội dung giới thiệu';
            $option->meta_key = 'about_content';
            $option->meta_value = $rq->about_content[$key];
            $option->save();

            $option = new Option;
            $option->name = 'ảnh giới thiệu';
            $option->meta_key = 'about_gallery';
            $option->meta_value = $rq->gallery_about[$key];
            $option->save();
        }


        $option_slide = Option::where('meta_key','video')->delete();
        $option = new Option;
        $option->name = 'video';
        $option->meta_key = 'video';    
        $option->meta_value = $rq->video; 
        $option->save();

        $option_slide = Option::where('meta_key','video_title1')->delete();
        $option = new Option;
        $option->name = 'video';
        $option->meta_key = 'video_title1';    
        $option->meta_value = $rq->video_title1; 
        $option->save();

        $option_slide = Option::where('meta_key','video_title2')->delete();
        $option = new Option;
        $option->name = 'video';
        $option->meta_key = 'video_title2';    
        $option->meta_value = $rq->video_title2; 
        $option->save();

        $option_slide = Option::where('meta_key','video_gallery')->delete();
        $option = new Option;
        $option->name = 'ảnh đại diện video';
        $option->meta_key = 'video_gallery';    
        $option->meta_value = $rq->video_gallery; 
        $option->save();
        

        $option_slide = Option::where('meta_key','product_look_product')->delete();
        $option_slide = Option::where('meta_key','product_look_gallery')->delete();
        foreach ($rq->product_id_look as $key => $value) 
        {
            $option = new Option;
            $option->name = 'sản phẩm hot';
            $option->meta_key = 'product_look_product';    
            $option->meta_value = $value; 
            $option->save();

            $option = new Option;
            $option->name = 'ảnh sản phẩm hot';
            $option->meta_key = 'product_look_gallery';    
            $option->meta_value = $rq->gallery_look[$key]; 
            $option->save();
        }    


        //collectios
        $option_slide = Option::where('meta_key','collection')->delete();
        $option_slide = Option::where('meta_key','collection_gallery')->delete();
        $option_slide = Option::where('meta_key','collection_title')->delete();
        foreach ($rq->collecttion as $key => $value) 
        {
            $option = new Option;
            $option->name = 'bộ sưu tập';
            $option->meta_key = 'collection';    
            $option->meta_value = $value; 
            $option->save();

            $option = new Option;
            $option->name = 'ảnh bộ sưu tập';
            $option->meta_key = 'collection_gallery';    
            $option->meta_value = $rq->gallery_col[$key]; 
            $option->save();


            $option = new Option;
            $option->name = 'tiêu đề bộ sưu tập';
            $option->meta_key = 'collection_title';    
            $option->meta_value = $rq->collection_title[$key]; 
            $option->save();
        } 


        $option_slide = Option::where('meta_key','look_title1')->delete();
        $option_slide = Option::where('meta_key','look_title2')->delete();
        $option = new Option;
        $option->name = 'tiêu đề sản phảm hot1';
        $option->meta_key = 'look_title1';    
        $option->meta_value = $rq->look_title1; 
        $option->save();
        $option = new Option;
        $option->name = 'tiêu đề sản phảm hot2';
        $option->meta_key = 'look_title2';    
        $option->meta_value = $rq->look_title2; 
        $option->save();

    }



}
