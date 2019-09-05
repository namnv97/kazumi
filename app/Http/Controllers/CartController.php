<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Pack;
use App\Model\Product;
use App\Model\Color;
use App\Model\Option;

class CartController extends Controller
{
    public function index(Request $request){
        $cok = $request->cookie('cart_item');
        $arr = [];
        if(!empty($cok)):
            $cart = json_decode($cok,true);
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
        return view('client.cart.index',['cart_item' => $arr]);
    }
    public function add_to_cart(Request $request)
    {
    	$cok = $request->cookie('cart_item');
    	if(!empty($cok)):
    		$cart = json_decode($cok,true);
    		$check = false;
    		foreach($cart as $key => $ca):
    			if($ca['pack_id'] == $request->pack_id &&  $ca['color_id'] == $request->color_id):
    				$cart[$key]['quantity'] ++;
    				$check = true;
    			endif;
    		endforeach;

    		if($check == false):
    			$cart[] = array(
    				'pack_id' => $request->pack_id,
    				'color_id' => $request->color_id,
    				'quantity' => 1
    			);
    		endif;
    	else:
    		$cart[] = array(
    			'pack_id' => $request->pack_id,
    			'color_id' => $request->color_id,
    			'quantity' => 1
    		);
    	endif;

    	if(!empty($request->essential)):
    		foreach($request->essential as $essential):
    			$ch = false;
    			foreach($cart as $key => $ca):
    				if($ca['pack_id'] == $essential):
    					$cart[$key]['quantity'] ++;
    					$ch = true;
    				endif;
    			endforeach;

    			if($ch == false):
    				$cart[] = array(
    					'pack_id' => $essential,
    					'color_id' => null,
    					'quantity' => 1
    				);
    			endif;
    		endforeach;
    	endif;

    	$num = 0;
    	foreach($cart as $ca):
    		$num += $ca['quantity'];
    	endforeach;

    	$cookie = cookie('cart_item', json_encode($cart) , 60*24*30);

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

    	return response(view('client.cart.cart_sidebar',['cart_item' => $arr]))->withCookie($cookie);
    }

    public function cart_update(Request $request)
    {
        $pack_id = $request->pack_id;
        $color_id = (empty($request->color_id))?NULL:$request->color_id;
        $quantity = $request->quantity;
        $cok = $request->cookie('cart_item');
        if(!empty($cok)):
            $cart = json_decode($cok,true);
            foreach($cart as $key => $ca):
                if($pack_id == $ca['pack_id'] && $color_id == $ca['color_id']):
                    $cart[$key]['quantity'] = $quantity;
                endif;
            endforeach;

            $cookie = cookie('cart_item',json_encode($cart),60*24*30);
            return response('Cập nhật thành công')->withCookie($cookie);
        endif;
        return response('Failure');        
    }

    public function cart_remove(Request $request){
        $pack_id = $request->pack_id;
        $color_id = empty($request->color_id)?NULL:$request->color_id;

        $cok = $request->cookie('cart_item');
        if(!empty($cok)):
            $cart = json_decode($cok,true);
            foreach($cart as $key => $ca):
                if($pack_id == $ca['pack_id'] && $color_id == $ca['color_id']):
                    unset($cart[$key]);
                endif;
            endforeach;

            $cookie = cookie('cart_item',json_encode($cart),60*24*30);
            return response('Xóa thành công')->withCookie($cookie);
        endif;
    }

    public function checkout()
    {
        $logo = Option::where('meta_key','logo')->first();
        return view('client.cart.checkout',compact('logo'));
    }

}
