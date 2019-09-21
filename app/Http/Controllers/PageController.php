<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Page;
use App\Model\PageCustomField;
use App\Model\Regions;
use App\Model\Earn_point;
use App\Model\Get_reward;
class PageController extends Controller
{
    public function index($slug = null)
    {
    	if($slug == null) return redrect()->route('home');

    	$page = Page::where('slug',$slug)->first();

    	if(empty($page)) return redrect()->route('home');

    	$template = $page->template;

    	switch ($template) {
    		case 'apply_care':
    			return $this->apply_care($page->id);
    			break;
    		case 'reward':
    			return $this->reward($page->id);
    			break;
    		case 'press':
    			return $this->press($page->id);
    			break;
    		case 'program':
    			return $this->program($page->id);
    			break;
    		case 'retailer':
    			return $this->retailer($page->id);
    			break;
    		case 'faq':
    			return $this->faq($page->id);
    			break;
    	}
    }

    public function apply_care($page_id)
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

    	$arrs = ['apply','remove','care'];
    	foreach($arrs as $ar):
    		$$ar = $$ar = PageCustomField::where([
    			['meta_field',$ar],
    			['page_id',$page_id]
    		])
    		->get();
    	endforeach;

    	return view('client.page.apply_care',compact('page','banner','page_title','description','apply_video','apply','remove','care'));
    }

    public function reward($page_id)
    {
    	$page = Page::find($page_id);

        $earn_point = Earn_point::where('status',1)->get();

        $getrewards = Get_reward::orderBy('created_at','desc')->get();

    	$arr = ['banner','banner_title','earn_title','earn_description','earn_img'];
    	foreach($arr as $ar):
    		$$ar = PageCustomField::where([
    			['meta_field',$ar],
    			['page_id',$page_id]
    		])
    		->first();
    	endforeach;

    	return view('client.page.reward',compact('page','banner','banner_title','earn_title','earn_description','earn_img','earn_point','getrewards'));
    }

    public function press($page_id)
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

    	$arrs = ['partner','as_user'];
    	foreach($arrs as $ar):
    		$$ar = PageCustomField::where([
    			['meta_field',$ar],
    			['page_id',$page_id]
    		])
    		->get();
    	endforeach;

    	return view('client.page.press',compact('page','banner','page_title','page_description','as_title','partner','as_user'));
    }

    public function program($page_id)
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

    	return view('client.page.program',compact('page','banner','page_title','page_description','pro_title','pro_description','programs'));
    }

    public function retailer($page_id)
    {
    	$page = Page::find($page_id);

    	$arr = ['banner','page_title','page_description','become_title','become_description'];

    	foreach($arr as $ar):
    		$$ar = PageCustomField::where([
    			['meta_field',$ar],
    			['page_id',$page_id]
    		])
    		->first();
    	endforeach;
    	$retailers = PageCustomField::where([
    			['meta_field','retailer'],
    			['page_id',$page_id]
    		])
    	->get();

    	$regions = Regions::all();

    	return view('client.page.retailer',compact('page','banner','page_title','page_description','become_title','become_description','retailers','regions'));
    }

    public function faq($page_id)
    {
    	$page = Page::find($page_id);

    	$arr = ['shipping_title','returnex_title','product_title','payment_title','contact_title'];

    	foreach($arr as $ar):
    		$$ar = PageCustomField::where([
    			['meta_field',$ar],
    			['page_id',$page_id]
    		])
    		->first();
    	endforeach;

    	$arrs = ['shipping','returnex','product','payment','contact'];

    	foreach($arrs as $ar):
    		$$ar = PageCustomField::where([
    			['meta_field',$ar],
    			['page_id',$page_id]
    		])
    		->get();
    	endforeach;

    	return view('client.page.faq',compact('page','shipping_title','returnex_title','product_title','payment_title','contact_title','shipping','returnex','product','payment','contact'));
    }


}
