<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoreAddApplyCare;
use App\Http\Requests\StoreEditApplyCare;
use App\Http\Requests\StoreAddReward;
use App\Http\Requests\StoreEditReward;
use App\Http\Requests\StoreAddProgram;
use App\Http\Requests\StoreEditProgram;
use App\Http\Requests\StoreAddPress;
use App\Http\Requests\StoreEditPress;
use App\Http\Requests\StoreAddRetailer;
use App\Http\Requests\StoreEditRetailer;

use DB;

use App\Model\Page;
use App\Model\Layout;
use App\Model\PageCustomField;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::leftJoin('layouts','layouts.template','pages.template')->select('pages.*','layouts.name as layout')->orderBy('created_at','asc')->paginate(10);
        return view('server.page.index',compact('pages'));

    }

    public function create()
    {
        $templates = Layout::all();
        return view('server.page.create',compact('templates'));
    }

    public function edit($id)
    {
        $page = Page::find($id);
        if(empty($page)) return redirect()->route('admin.pages.index');
        switch ($page->template) {
            case 'apply_care':
                return $this->edit_apply_care($page->id);
                break;
            case 'reward':
                return $this->edit_reward($page->id);
                break;
            case 'program':
                return $this->edit_program($page->id);
                break;
            case 'press':
                return $this->edit_press($page->id);
                break;
            case 'retailer':
                return $this->edit_retailer($page->id);
                break;
        }
    }

    public function apply_care(StoreAddApplyCare $request)
    {
        $page = new Page();
        $page->template = $request->template;
        $page->name = $request->name;
        $page->slug = $request->slug;
        $page->save();

        $req = $request->only(['banner','page_title','description','apply_video']);

        foreach($req as $field => $val):
            $op = new PageCustomField();
            $op->page_id = $page->id;
            $op->meta_field = $field;
            $op->meta_value = $val;
            $op->save();
            unset($op);
        endforeach;

        if(!empty($request->apply_image)):
            $image = $request->apply_image;
            $content = $request->apply_content;
            foreach($image as $key => $val):
                $op = new PageCustomField();
                $op->page_id = $page->id;
                $op->meta_field = 'apply';
                $op->meta_value = json_encode(['image' => $val,'content' => $content[$key]]);
                $op->save();
                unset($op);
            endforeach;
            unset($image);
            unset($content);
        endif;

         if(!empty($request->remove_image)):
            $image = $request->remove_image;
            $content = $request->remove_content;
            foreach($image as $key => $val):
                $op = new PageCustomField();
                $op->page_id = $page->id;
                $op->meta_field = 'remove';
                $op->meta_value = json_encode(['image' => $val,'content' => $content[$key]]);
                $op->save();
                unset($op);
            endforeach;
            unset($image);
            unset($content);
        endif;


         if(!empty($request->care_image)):
            $image = $request->care_image;
            $content = $request->care_content;
            foreach($image as $key => $val):
                $op = new PageCustomField();
                $op->page_id = $page->id;
                $op->meta_field = 'care';
                $op->meta_value = json_encode(['image' => $val,'content' => $content[$key]]);
                $op->save();
                unset($op);
            endforeach;
            unset($image);
            unset($content);
        endif;

        return redirect()->route('admin.pages.edit',['id' => $page->id]);
    }

    public function edit_apply_care($page_id)
    {
        $page = Page::find($page_id);

        $arr = ['banner','page_title','description','apply_video'];
        foreach($arr as $ar):
            $$ar = PageCustomField::where([
                ['meta_field',$ar],
                ['page_id',$page_id]
            ])
            ->first();
        endforeach;

        $list_apply = PageCustomField::where([
            ['meta_field','apply'],
            ['page_id',$page_id]
        ])
        ->get();

        $list_remove = PageCustomField::where([
            ['meta_field','remove'],
            ['page_id',$page_id]
        ])
        ->get();

        $list_care = PageCustomField::where([
            ['meta_field','care'],
            ['page_id',$page_id]
        ])
        ->get();


        return view('server.layout_edit.apply_care',compact('page','banner','page_title','description','apply_video','list_apply','list_remove','list_care'));
    }

    public function post_edit_apply_care(StoreEditApplyCare $request)
    {
        $id = $request->id;

        $page = Page::find($id);

        if(empty($page)) return back();

        $page->name = $request->name;
        $page->slug = $request->slug;
        $page->save();

        $req = $request->only(['banner','page_title','description','apply_video']);

        foreach($req as $field => $val):
            $op = PageCustomField::where([
                ['meta_field',$field],
                ['page_id',$id]
            ])
            ->first();
            $op->meta_value = $val;
            $op->save();
            unset($op);
        endforeach;

        DB::table('page_custom_field')
        ->where([
            ['meta_field','apply'],
            ['page_id',$id]
        ])
        ->delete();

        DB::table('page_custom_field')
        ->where([
            ['meta_field','remove'],
            ['page_id',$id]
        ])
        ->delete();

        DB::table('page_custom_field')
        ->where([
            ['meta_field','care'],
            ['page_id',$id]
        ])
        ->delete();

        if(!empty($request->apply_image)):
            $image = $request->apply_image;
            $content = $request->apply_content;
            foreach($image as $key => $val):
                $op = new PageCustomField();
                $op->page_id = $page->id;
                $op->meta_field = 'apply';
                $op->meta_value = json_encode(['image' => $val,'content' => $content[$key]]);
                $op->save();
                unset($op);
            endforeach;
            unset($image);
            unset($content);
        endif;

         if(!empty($request->remove_image)):
            $image = $request->remove_image;
            $content = $request->remove_content;
            foreach($image as $key => $val):
                $op = new PageCustomField();
                $op->page_id = $page->id;
                $op->meta_field = 'remove';
                $op->meta_value = json_encode(['image' => $val,'content' => $content[$key]]);
                $op->save();
                unset($op);
            endforeach;
            unset($image);
            unset($content);
        endif;


         if(!empty($request->care_image)):
            $image = $request->care_image;
            $content = $request->care_content;
            foreach($image as $key => $val):
                $op = new PageCustomField();
                $op->page_id = $page->id;
                $op->meta_field = 'care';
                $op->meta_value = json_encode(['image' => $val,'content' => $content[$key]]);
                $op->save();
                unset($op);
            endforeach;
            unset($image);
            unset($content);
        endif;

        return redirect()->route('admin.pages.edit',['id' => $id])->with('msg',"Cập nhật thành công");

    }

    public function reward(StoreAddReward $request)
    {
        $page = new Page();
        $page->template = $request->template;
        $page->name = $request->name;
        $page->slug = $request->slug;
        $page->save();


        $req = $request->only(['banner','banner_title','earn_title','earn_description','earn_img']);
        foreach($req as $field => $val):
            $op = new PageCustomField();
            $op->page_id = $page->id;
            $op->meta_field = $field;
            $op->meta_value = $val;
            $op->save();
            unset($op);
        endforeach;

        return redirect()->route('admin.pages.edit',['id' => $page->id]);

    }

    public function edit_reward($page_id)
    {
        $page = Page::find($page_id);

        $arr = ['banner','banner_title','earn_title','earn_description','earn_img'];

        foreach($arr as $ar):
            $$ar = PageCustomField::where([
                ['meta_field',$ar],
                ['page_id',$page_id]
            ])
            ->first();
        endforeach;

        return view('server.layout_edit.reward',compact('page','banner','banner_title','earn_title','earn_description','earn_img'));
    }

    public function post_edit_reward(StoreEditReward $request)
    {
        $id = $request->id;

        $page = Page::find($id);

        if(empty($page)) return back();

        $page->name = $request->name;
        $page->slug = $request->slug;
        $page->save();

        $req = $request->only(['banner','banner_title','earn_title','earn_description','earn_img']);

        foreach($req as $field => $val):
            PageCustomField::where([
                ['meta_field',$field],
                ['page_id',$id]
            ])
            ->update(['meta_value' => $val]);
        endforeach;

        return redirect()->route('admin.pages.edit',['id' => $id])->with('msg',"Cập nhật thành công");

    }

    public function program(StoreAddProgram $request)
    {
        $page = new Page();
        $page->template = $request->template;
        $page->name = $request->name;
        $page->slug = $request->slug;
        $page->save();

        $req = $request->only(['banner','page_title','page_description','pro_title','pro_description']);
        foreach($req as $field => $val):
            $op = new PageCustomField();
            $op->page_id = $page->id;
            $op->meta_field = $field;
            $op->meta_value = $val;
            $op->save();
            unset($op);
        endforeach;


        if(!empty($request->program_img)):
            $image = $request->program_img;
            $text = $request->program_name;
            foreach($image as $key => $val):
                $op = new PageCustomField();
                $op->page_id = $page->id;
                $op->meta_field = 'program';
                $op->meta_value = json_encode(['image' => $val,'name' => $text[$key]]);
                $op->save();
                unset($op);
            endforeach;
        endif;

        return redirect()->route('admin.pages.edit',['id' => $page->id]);
    }

    public function edit_program($page_id)
    {
        $page = Page::find($page_id);

        $arr = ['banner','page_title','page_description','pro_title','pro_description'];

        foreach($arr as $ar):
            $$ar = PageCustomField::where([
                ['meta_field',$ar],
                ['page_id',$page_id]
            ])
            ->first();
        endforeach;

        $programs = PageCustomField::where([
            ['meta_field','program'],
            ['page_id',$page_id]
        ])
        ->get();

        return view('server.layout_edit.program',compact('page','banner','page_title','page_description','pro_title','pro_description','programs'));
    }

    public function post_edit_program(StoreEditProgram $request)
    {
        $id = $request->id;

        $page = Page::find($id);

        if(empty($page)) return back();

        $page->name = $request->name;
        $page->slug = $request->slug;
        $page->save();

        $req = $request->only(['banner','page_title','page_description','pro_title','pro_description']);
        foreach($req as $field => $val):
            PageCustomField::where([
                ['meta_field',$field],
                ['page_id',$id]
            ])
            ->update(['meta_value' => $val]);
        endforeach;

        PageCustomField::where([
            ['meta_field','program'],
            ['page_id',$id]
        ])
        ->delete();

        if(!empty($request->program_img)):
            $image = $request->program_img;
            $text = $request->program_name;
            foreach($image as $key => $val):
                $op = new PageCustomField();
                $op->page_id = $page->id;
                $op->meta_field = 'program';
                $op->meta_value = json_encode(['image' => $val,'name' => $text[$key]]);
                $op->save();
                unset($op);
            endforeach;
        endif;

        return redirect()->route('admin.pages.edit',['id' => $page->id])->with('msg',"Cập nhật thành công");
    }


    public function press(StoreAddPress $request)
    {
        $page = new Page();
        $page->template = $request->template;
        $page->name = $request->name;
        $page->slug = $request->slug;
        $page->save();

        $req = $request->only(['banner','page_title','page_description','as_title']);
        foreach($req as $field => $val):
            $op = new PageCustomField();
            $op->page_id = $page->id;
            $op->meta_field = $field;
            $op->meta_value = $val;
            $op->save();
            unset($op);
        endforeach;

        if(!empty($request->partner)):
            $partners = $request->partner;
            foreach($partners as $partner):
                $op = new PageCustomField();
                $op->page_id = $page->id;
                $op->meta_field = 'partner';
                $op->meta_value = $partner;
                $op->save();
                unset($op);
            endforeach;
        endif;

        if(!empty($request->as_image)):
            $images = $request->as_image;
            $text = $request->as_content;
            foreach($images as $key => $img):
                $op = new PageCustomField();
                $op->page_id = $page->id;
                $op->meta_field = 'as_user';
                $op->meta_value = json_encode(['image'=>$img,'text'=>$text[$key]]);
                $op->save();
                unset($op);
            endforeach;
        endif;

        return redirect()->route('admin.pages.edit',['id' => $page->id]);
    }

    public function edit_press($page_id)
    {
        $page = Page::find($page_id);

        $arr = ['banner','page_title','page_description','as_title'];

        foreach($arr as $ar):
            $$ar = PageCustomField::where([
                ['meta_field',$ar],
                ['page_id',$page_id]
            ])
            ->first();
        endforeach;

        $partners = PageCustomField::where([
            ['meta_field','partner'],
            ['page_id',$page_id]
        ])
        ->get();

        $as_user = PageCustomField::where([
            ['meta_field','as_user'],
            ['page_id',$page_id]
        ])
        ->get();

        return view('server.layout_edit.press',compact('page','banner','page_title','page_description','as_title','partners','as_user'));
    }

    public function post_edit_press(StoreEditPress $request)
    {
        $id = $request->id;

        $page = Page::find($id);

        if(empty($page)) return back();

        $page->name = $request->name;
        $page->slug = $request->slug;
        $page->save();

        $req = $request->only(['banner','page_title','page_description','as_title']);
        foreach($req as $field => $val):
            PageCustomField::where([
                ['meta_field',$field],
                ['page_id',$id]
            ])
            ->update(['meta_value' => $val]);
        endforeach;

        PageCustomField::where([
            ['meta_field','partner'],
            ['page_id',$id]
        ])
        ->delete();
        PageCustomField::where([
            ['meta_field','as_user'],
            ['page_id',$id]
        ])
        ->delete();

        if(!empty($request->partner)):
            $partners = $request->partner;
            foreach($partners as $partner):
                $op = new PageCustomField();
                $op->page_id = $id;
                $op->meta_field = 'partner';
                $op->meta_value = $partner;
                $op->save();
                unset($op);
            endforeach;
        endif;

        if(!empty($request->as_image)):
            $images = $request->as_image;
            $text = $request->as_content;
            foreach($images as $key => $img):
                $op = new PageCustomField();
                $op->page_id = $id;
                $op->meta_field = 'as_user';
                $op->meta_value = json_encode(['image'=>$img,'text'=>$text[$key]]);
                $op->save();
                unset($op);
            endforeach;
        endif;

        return redirect()->route('admin.pages.edit',['id' => $id])->with('msg',"Cập nhật thành công");
    }

    public function retailer(StoreAddRetailer $request)
    {
        $page = new Page();
        $page->template = $request->template;
        $page->name = $request->name;
        $page->slug = $request->slug;
        $page->save();

        $req = $request->only(['banner','page_title','page_description','become_title','become_description']);
        foreach($req as $field => $val):
            $op = new PageCustomField();
            $op->page_id = $page->id;
            $op->meta_field = $field;
            $op->meta_value = $val;
            $op->save();
            unset($op);
        endforeach;
        if(!empty($request->retailer)):
            foreach($request->retailer as $retailer):
                $op = new PageCustomField();
                $op->page_id = $page->id;
                $op->meta_field = 'retailer';
                $op->meta_value = $retailer;
                $op->save();
                unset($op);
            endforeach;
        endif;

        return redirect()->route('admin.pages.edit',['id' => $page->id]);
    }

    public function edit_retailer($page_id)
    {
        $page = Page::find($page_id);

        return view('server.layout_edit.retailer',compact('page'));
    }

    public function post_edit_retailer(StoreEditRetailer $request)
    {
        dd($request->all());
    }






    
    public function get_template(Request $request)
    {
        return view('server.layout.'.$request->template);
    }

    public function check_slug(Request $request)
    {
        $page = Page::where('slug',$request->slug)->first();

        if(!empty($page)) return response()->json(['status' => 'errors','msg' => 'Đường dẫn đã tồn tại']);
    }


}
