<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Pack;
use App\Model\Product;
use App\Model\Color;
use App\Model\Option;
use App\Model\Discount;
use App\Model\UserDiscount;
use App\Model\Cart;
use App\Model\CartItem;
use App\Model\Reward;
use App\Model\User;
use App\Model\Voucher;
use App\Model\UserRef;

use DB;
use Auth;

class CartController extends Controller
{
    public function __construct()
    {
        \Carbon\Carbon::setLocale('vi_VN');
    }
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

    public function checkout(Request $request)
    {
        $logo = Option::where('meta_key','logo')->first();
        $items = $request->cookie('cart_item');
        if(empty($items)) return redirect()->route('home');
        $items = json_decode($items,true);
        foreach($items as $ca):
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

        if(empty($request->step))
        {
            return view('client.cart.checkout',compact('logo','arr'));
        }
        else
        {
            if($request->step == 'order_review')
            {
                return view('client.cart.order_review',compact('logo','arr'));
            }
            if($request->step == 'payment')
            {
                $vlist = Voucher::where([
                    ['user_id',Auth::user()->id],
                    ['status',1]
                ])
                ->get();
                if(!isset($_SERVER['HTTP_REFERER']) || ($_SERVER['HTTP_REFERER'] != route('client.checkout',['step' => 'order_review']))) return redirect()->route('client.checkout',['step' => 'order_review']);
                $trade = 23110;
                return view('client.cart.payment',compact('logo','arr','trade','vlist'));
            }
        }
        
    }

    public function discount(Request $request)
    {
        $code = $request->discount;
        
        $discount = Discount::where('code',$code)->first();

        if(empty($discount)) return response()->json(['status' => 'errors','msg' => 'Mã giảm giá sai. Vui lòng kiểm tra lại']);

        $userdiscount = UserDiscount::where([
            ['user_id',Auth::user()->id],
            ['discount_id',$discount->id]
        ])
        ->first();

        $end = \Carbon\Carbon::parse($discount->date_end)->format('U');
        $time = \Carbon\Carbon::now()->format('U');

        if($time > $end) return response()->json(['status' => 'errors','msg' => 'Mã giảm giá đã hết hạn. Vui lòng sử dụng mã hợp lệ']);

        if(!empty($userdiscount)) return response()->json(['status' => 'errors','msg' => 'Mã giảm giá đã được sử dụng']);
        return response()->json(['status' => 'success','code' => $discount->code,'type' => $discount->type,'value' => $discount->discount_value]);

    }

    public function voucher(Request $request)
    {
        $code = $request->code;
        
        $discount = Voucher::where([
            ['code',$code],
            ['status',1]
        ])->first();

        if(empty($discount)):
            return response()->json(['status' => 'error','msg' => 'Voucher này đã được sử dụng']);
        endif;

        return response()->json(['status' => 'success','code' => $discount->code,'type' => 'total','value' => $discount->discount_value]);

    }

    public function order(Request $request)
    {

        $req = $request->only(['first_name','last_name','company','address1','address2','city','phone','payment_method','total']);

        if($request->payment_method == 'online')
        {
            $req['paypal_order_id'] = $request->order_id;
            $req['payment_status'] = '1';
            $req['status'] = 1;
        }
        else
        {
            $req['payment_status'] = '0';
        }
        if(!empty($request->discount)):
            $dc = Discount::where('code',$request->discount)->first();
            $req['discount_id'] = $dc->id;
            $userdiscount = new UserDiscount();
            $userdiscount->user_id = Auth::user()->id;
            $userdiscount->discount_id = $dc->id;
            $userdiscount->save();
        endif;

        if(!empty($request->voucher_code)):
            $vc = Voucher::where('code',$request->voucher_code)->first();
            $req['voucher_id'] = $vc->id;
            $vc->status = 0;
            $vc->save();
        endif;



        $cart = new Cart();

        foreach($req as $field => $value):
            $cart->$field = $value;
        endforeach;
        $cart->user_id = Auth::user()->id;

        $cart->save();

        $reward = new Reward();
        $reward->user_id = Auth::user()->id;
        $reward->action = 'Hoàn tất đơn hàng #'.$cart->id;
        $reward->point = floor($request->subtotal/2000);
        $reward->status = 'approved';
        $reward->save();

        $user = User::find(Auth::user()->id);
        $user->point_reward += floor($request->total/2000);
        $user->save();

        $userref = UserRef::where('user_ref',Auth::user()->id)->first();
        if($userref->status == 1):
            $money = Cart::select(DB::raw("SUM(total) as total_money"),'user_id')->where('user_id',Auth::user()->id)->first();
            if(intval($money->total_money) > 3000000):
                $userref->status = 0;
                $userref->save();

                $reward = new Reward();
                $reward->user_id = $userref->user_ori()->id;
                $reward->action = "Người dùng ".$user->name." tổng thanh toán trên 3.000.000 VNĐ.";
                $reward->point = 3000;
                $reward->status = 'approved';
                $reward->save();
            endif;
        endif;


        $cart_item = $request->cookie('cart_item');

        $items = json_decode($cart_item,true);

        foreach($items as $item):
            $cart_item = new CartItem();
            $cart_item->cart_id = $cart->id;
            $cart_item->pack_id = $item['pack_id'];
            $cart_item->color_id = $item['color_id'];
            $cart_item->quantity = $item['quantity'];
            $pack = Pack::find($item['pack_id']);
            if(!empty($pack->sale)) $cart_item->price = $pack->sale;
            else $cart_item->price = $pack->price;
            unset($pack);
            $cart_item->save();
            unset($cart_item);
        endforeach;

        $cookie = cookie('cart_item','',-1);

        return response()->json(['status' => 'success','msg' => 'Đặt hàng thành công'])->withCookie($cookie);
    }

}
