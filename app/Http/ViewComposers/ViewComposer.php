<?php 
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Http\Request;

use App\Model\Option;
use App\Model\Product;
use App\Model\Pack;
use App\Model\Color;
use App\Model\Cart;

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

        $cart = request()->cookie('cart_item');

        $num = 0;

        if(!empty($cart)):
            $cart = json_decode($cart,true);
            foreach($cart as $ca):
                $num += $ca['quantity'];
            endforeach;
        endif;

        

        $view->with('num',$num);
    }


    public function cart_sidebar(View $view)
    {
        $cart = request()->cookie('cart_item');

        $arr = [];
        if(!empty($cart)):
            $cart = json_decode($cart,true);

            foreach($cart as $ca):
                $pack = Pack::find($ca['pack_id']);
                $color = Color::find($ca['color_id']);
                $item = array(
                    'product' => $pack->product()->name,
                    'slug' => $pack->product()->slug,
                    'pack_id' => $pack->id,
                    'pack_name' => $pack->name,
                    'image' => $pack->product()->gallery[0]->url,
                    'price' => $pack->price,
                    'sale' => $pack->sale,
                    'quantity' => $ca['quantity']
                );
                if(!empty($color)){
                    $item['color'] = $color->name;
                    $item['color_id'] = $color->id;
                }
                $arr[] = $item;
            endforeach;
        endif;

        $view->with('cart_item',$arr);
    }

    public function recent_view(View $view)
    {
        $cok = request()->cookie('recent_view');
        $arr = [];
        if(!empty($cok)):
            $arr = json_decode($cok,true);
        endif;

        $recents = Product::whereIn('id',$arr)->get();
        
        $view->with('recents',$recents);
    }


    public function decide(View $view)
    {
        $arr = ['banner_collection','suggest_collection'];
        foreach($arr as $ar):
            $$ar = Option::where('meta_key',$ar)->first();
            $view->with($ar,$$ar);
        endforeach;
    }

    public function footer(View $view)
    {
        $footer = Option::where('meta_key','footer')->get();
        $view->with('footer',$footer);
    }


    public function order_pending(View $view)
    {
        $carts = Cart::where('status',0)->get();
        $order_pending = count($carts);
        $view->with('order_pending',$order_pending);
    }


    public function search_page(View $view)
    {
        $logo = Option::where('meta_key','logo')->first();
        $view->with('logo',$logo->meta_value);

    }







}
 ?>