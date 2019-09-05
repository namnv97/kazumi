<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Pack;
use App\Model\Product;
use App\Model\Color;

class CartController extends Controller
{
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

    	return response()->json(['num' => $num])->withCookie($cookie);
    }

    public function get_view(Request $request)
    {
        $cart = $request->cookie('cart_item');
        $arr = [];
        
        if(!empty($cart)):
            $cart = json_decode($cart,true);
            foreach($cart as $ca):
                $pack = Pack::find($ca['pack_id']);
                $color = Color::find($ca['color_id']);
                $arr[] = array(
                    'product' => $pack->product()->name,
                    'slug' => $pack->product()->slug,
                    'pack_id' => $pack->id,
                    'pack_name' => $pack->name,
                    'image' => $pack->product()->gallery[0]->url,
                    'price' => $pack->price,
                    'sale' => $pack->sale,
                    'quantity' => $ca['quantity']
                );
            endforeach;
        endif;

        return view('client.cart.cart_sidebar',['cart_item' => $arr]);

    }

}
