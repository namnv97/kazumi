<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAddProduct;
use App\Http\Requests\StoreEditProduct;

use App\Model\Product;
use App\Model\Collection;
use App\Model\Pack;
use App\Model\Color;
use App\Model\PackColor;
use App\Model\ProductCollection;
use App\Model\Gallery;
use App\Model\Essential;
use App\Model\RegisterMail;

use Mail;
Use App\Jobs\SendProductEmail;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::where('status',1)->orderBy('created_at','desc')->paginate(10);
    	return view('server.product.index',compact('products'));
    }

    public function create()
    {
        $collections = Collection::orderBy('created_at','desc')->get();
        $colors = Color::orderBy('created_at','desc')->get();
        $products = Product::all();
    	return view('server.product.create',compact('collections','colors','products'));
    }

    public function postCreate(StoreAddProduct $request)
    {
    	$product = new Product();
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->description = $request->description;
        $product->product_content = $request->product_content;

        $product->save();

        $pack_single = new Pack();

        $pack_single->product_id = $product->id;
        $pack_single->type = 'single';
        $pack_single->name = $request->pack_single;
        $pack_single->price = $request->price_single;
        $pack_single->sale = $request->sale_single;
        $pack_single->save();

        
        if(!empty($request->color_single))
        {
            foreach($request->color_single as $col)
            {
                $color = new PackColor();
                $color->pack_id = $pack_single->id;
                $color->color_id = $col;
                $color->save();
                unset($color);
            }
        }

        if(!empty($request->pack_multi) && !empty($request->price_multi) && !empty($request->color_multi))
        {
            $pack_multi = new Pack();

            $pack_multi->product_id = $product->id;
            $pack_multi->type = 'multi';
            $pack_multi->name = $request->pack_multi;
            $pack_multi->price = $request->price_multi;
            $pack_multi->sale = $request->sale_multi;
            $pack_multi->save();


            foreach($request->color_multi as $col)
            {
                $color = new PackColor();
                $color->pack_id = $pack_multi->id;
                $color->color_id = $col;
                $color->save();
                unset($color);
            }
        }

        foreach($request->collection_id as $col)
        {
            $pco = new ProductCollection();
            $pco->product_id = $product->id;
            $pco->collection_id = $col;
            $pco->save();
            unset($pco);
        }

        foreach($request->gallery as $gal)
        {
            $gallery = new Gallery();
            $gallery->product_id = $product->id;
            $gallery->type = 'image';
            $gallery->url = $gal;
            $gallery->save();
            unset($gallery);
         }

        if(!empty($request->gallery_video)):
            foreach($request->gallery_video as $video)
            {
                if(!empty($video)):
                    $gallery = new Gallery();
                    $gallery->product_id = $product->id;
                    $gallery->type = 'video';
                    $gallery->url = $video;
                    $gallery->save();
                    unset($gallery);
                endif;
            }
        endif;

        if(!empty($request->essential)):
            foreach($request->essential as $essential):
                $ess = new Essential();
                $ess->product_id = $product->id;
                $ess->essential_product_id = $essential;
                $ess->save();
                unset($ess);
            endforeach;
        endif;

        $this->dispatch(new SendProductEmail($product));

        return redirect()->route('admin.products.edit',['id' => $product->id]);
    }

    public function edit($id = null)
    {
        if($id == null) return redirect()->route('admin.products.index');
        $collections = Collection::orderBy('created_at','desc')->get();
        $colors = Color::orderBy('created_at','desc')->get();
        $product = Product::find($id);

        if(empty($product)) return redirect()->back();

        $pack_single = Pack::where([
            ['packs.type','=','single'],
            ['packs.product_id','=',$id]
        ])
        ->first();
        
        

        $pack_multi = Pack::where([
            ['packs.type','=','multi'],
            ['packs.product_id','=',$id]
        ])
        ->first();


        $collection = ProductCollection::leftJoin('products','products.id','=','product_collection.product_id')
        ->leftJoin('collections','collections.id','=','product_collection.collection_id')
        ->select('collections.id')
        ->where('products.id','=',$id)
        ->get();

        $gallery_image = Gallery::leftJoin('products','galleries.product_id','=','products.id')
        ->select('galleries.id as id','galleries.url as url')
        ->where([
            ['products.id','=',$id],
            ['galleries.type','=','image']
        ])
        ->get();

        $gallery_video = Gallery::leftJoin('products','galleries.product_id','=','products.id')
        ->select('galleries.id as id','galleries.url as url')
        ->where([
            ['products.id','=',$id],
            ['galleries.type','=','video']
        ])
        ->get();

        $products = Product::where('id','<>',$id)->get();

        $essentials = Essential::where('product_id',$id)->get();
        

    	return view('server.product.edit',compact('collections','colors','product','pack_single','pack_multi','collection','gallery_image','gallery_video','products','essentials'));
    }


    public function postEdit(StoreEditProduct $request,$id)
    {
        $product = Product::find($id);
        if(empty($product)) return redirect()->back();

        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->description = $request->description;
        $product->product_content = $request->product_content;
        $product->save();

        $single = Pack::find($request->single_id);
        $single->name = $request->pack_single;
        $single->price = $request->price_single;
        $single->sale = $request->sale_single;
        $single->save();

        PackColor::where('pack_id',$request->single_id)->delete();

        if(!empty($request->color_single)):
            foreach($request->color_single as $sg):
                $pc = new PackColor();
                $pc->pack_id = $request->single_id;
                $pc->color_id = $sg;
                $pc->save();
                unset($pc);
            endforeach;
        endif;

        $name_multi = $request->pack_multi;
        $price_multi = $request->price_multi;
        if(!empty($name_multi) && !empty($price_multi))
        {
            if(isset($request->multi_id)):
                $multi = Pack::find($request->multi_id);
                $multi->name = $name_multi;
                $multi->price = $price_multi;
                $multi->sale = $request->sale_multi;
                $multi->save();

                $pack_color = PackColor::where('pack_id','=',$request->multi_id)->delete();

                if(!empty($request->color_multi)):
                    foreach($request->color_multi as $cm):
                        $pc = new PackColor();
                        $pc->pack_id = $request->multi_id;
                        $pc->color_id = $cm;
                        $pc->save();
                        unset($pc);
                    endforeach;
                endif;

            else:

                $multi = new Pack();
                $multi->product_id = $id;
                $multi->type = 'multi';
                $multi->name = $name_multi;
                $multi->price = $price_multi;
                $multi->sale = $request->sale_multi;
                $multi->save();

                $pack_color = PackColor::where('pack_id','=',$request->multi_id)->delete();

                if(!empty($request->color_multi)):
                    foreach($request->color_multi as $cm):
                        $pc = new PackColor();
                        $pc->pack_id = $multi->id;
                        $pc->color_id = $cm;
                        $pc->save();
                        unset($pc);
                    endforeach;
                endif;

            endif;
        }

        $collections = $request->collection_id;

        ProductCollection::whereNotIn('collection_id',$collections)
        ->where('product_id',$id)
        ->delete();

        foreach($collections as $col):
            $collection = ProductCollection::where([
                ['product_id',$id],
                ['collection_id',$col]
            ])->first();
            if(empty($collection)):
                $new = new ProductCollection();
                $new->product_id = $id;
                $new->collection_id = $col;
                $new->save();
                unset($new);
            endif;
        endforeach;

        $gallery_image = $request->gallery;

        Gallery::where([
            ['product_id',$id],
            ['type','image']
        ])
        ->delete();

        foreach($gallery_image as $gallery):
            $gl = new Gallery();
            $gl->product_id = $id;
            $gl->type = 'image';
            $gl->url = $gallery;
            $gl->save();
            unset($gl);
        endforeach;


        $gallery_video = $request->gallery_video;
        if(!empty($gallery_video)):

            $galim = Gallery::whereNotIn('url',$gallery_video)
            ->where([
                ['product_id',$id],
                ['type','video']
            ])
            ->get();
            
            if(count($galim) > 0):
                foreach($galim as $gl):
                    $gl->delete();
                endforeach;
            endif;

            foreach($gallery_video as $gallery):
                $gal = Gallery::where([
                    ['url',$gallery],
                    ['product_id',$id],
                    ['type','video']
                ])
                ->first();
                if(empty($gal)):
                    $gl = new Gallery();
                    $gl->product_id = $id;
                    $gl->type = 'video';
                    $gl->url = $gallery;
                    $gl->save();
                    unset($gl);
                endif;
            endforeach;
        endif;

        Essential::where('product_id',$id)->delete();

        if(!empty($request->essential)):
            foreach($request->essential as $essential):
                $ess = new Essential();
                $ess->product_id = $id;
                $ess->essential_product_id = $essential;
                $ess->save();
                unset($ess);
            endforeach;
        endif;

        
        return redirect()->route('admin.products.edit',['id' => $id])->with('msg','Cập nhật thành công');
    }

    public function delete($id = null)
    {
    	$product = Product::find($id);

        $product->status = 0;

        $product->save();

        return redirect()->route('admin.products.index')->with('msg_del','Sản phẩm đã xóa ');
    }

    public function get_product(Request $request)
    {
        $key = $request->q;

        $products = Product::where('name','like',"%$key%")->select('id','name as text')->get();
        return response()->json($products);
    }

    public function send_mail($product)
    {
        $emails = RegisterMail::select('email')->get()->toArray();

        $emails = array_merge_recursive(...$emails)['email'];

        Mail::send('mail.new_product', array('product' => $product), 
            function($message) use ($emails){
                $message
                ->from('admin@admin.org', 'Administrator')
                ->subject('Thông báo sản phẩm mới')
                ->to($email);
            });
    }
}
