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
        		
        	],
        	[

        	]
        );

        DB::table('products')->insert($products);
    }
}
