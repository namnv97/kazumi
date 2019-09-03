<?php 
namespace App\Http\ViewComposers;

use Illuminate\View\View;

use App\Model\Option;
use App\Model\Product;

class ViewComposer
{
	public function compose(View $view)
    {
    	$logo = '/assets/uploads/images/logo.jpg';

    	$op = Option::where('meta_key','logo')->first();

    	if(!empty($op) && !empty($op->meta_value)) $logo = $op->meta_value;

    	$view->with('logo',$logo);

    	$menus = Option::where('meta_key','menus')->first();

    	$view->with('menus',$menus);

    	$mega_menu = Option::where('meta_key','mega_menu')->get();

    	$view->with('mega_menu',$mega_menu);

    	$mega_product = Option::where('meta_key','mega_product')->get();

    	if(count($mega_product) > 0):
    		$arr = [];
    		foreach($mega_product as $key => $mega):
    			$mn = json_decode($mega->meta_value,true);
    			$product = Product::find($mn['id']);
    			$arr[$key] = array(
    				'title' => $mn['title'],
    				'note' => $mn['note'],
    				'slug' => $product->slug
    			);
    			if(count($product->gallery) > 0):
    				$arr[$key]['image'] = $product->gallery[0]->url;
    			endif;
    		endforeach;
    		$view->with('mega_product',$arr);
    	endif;

    	
    }
}
















 ?>