<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $products = array(
        	[
        		'name' => 'Lông mi gân lụa',
                'slug' => 'long-mi-gan-lua',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipi...',
                'product_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo conse',
                'created_at' => date('Y-m-d H:i:s',time())
        	]
        );

        $procol = array(
            [
                'product_id' => 1,
                'collection_id' => 1,
                'created_at' => date('Y-m-d H:i:s',time())
            ]
        );

        $gallery = array(
            [
                'product_id' => 1,
                'type' => 'image',
                'url' => '/assets/uploads/images/Products/longmi1.jpg',
                'created_at' => date('Y-m-d H:i:s',time())
            ],
            [
                'product_id' => 1,
                'type' => 'image',
                'url' => '/assets/uploads/images/Products/longmi3.jpg',
                'created_at' => date('Y-m-d H:i:s',time())
            ]
        );

        $pack = array(
            [
                'product_id' => 1,
                'type' => 'single',
                'name' => '1 sản phẩm',
                'price' => 60000.00,
                'sale' => 55000.00,
                'created_at' => date('Y-m-d H:i:s',time())
            ]
        );

        DB::table('products')->insert($products);
        DB::table('product_collection')->insert($procol);
        DB::table('galleries')->insert($gallery);
        DB::table('packs')->insert($pack);
    }
}
