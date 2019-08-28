<?php

use Illuminate\Database\Seeder;

class CollectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $collections = array(
        	// [
        	// 	'name' => 'Lông mi 3D gân lụa',
        	// 	'slug' => str_slug('Lông mi 3D gân lụa','-'),
        	// 	'description' => 'Lông mi 3D gân lụa'
        	// ],
            [
                'name' => 'Lông mi gân lụa siêu nhẹ',
                'slug' => str_slug('Lông mi gân lụa siêu nhẹ','-'),
                'description' => 'Lông mi gân lụa siêu nhẹ'
            ]
        );

        DB::table('collections')->insert($collections);
    }
}
