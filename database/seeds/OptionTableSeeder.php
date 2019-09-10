<?php

use Illuminate\Database\Seeder;

class OptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $menu = array (
            array (
                'url' => '#',
                'text' => 'SHOP',
            ),
            array (
                'url' => '#',
                'text' => 'LEARN',
                'children' => 
                array (
                    array (
                        'url' => '#',
                        'text' => 'LASH GUIDE',
                    ),
                    array (
                        'url' => '#',
                        'text' => 'Áp dụng và chăm sóc',
                    ),
                ),
            ),
            array (
                'url' => '#',
                'text' => 'Điểm thưởng',
            ),
            array (
                'url' => '#',
                'text' => 'Press',
            ),
            array (
                'url' => '#',
                'text' => 'MORE',
                'children' => 
                array (
                    array (
                        'url' => '#',
                        'text' => 'Program',
                    ),
                    array (
                        'url' => '#',
                        'text' => 'TIN TỨC',
                    ),
                    array (
                        'url' => '#',
                        'text' => 'Retail',
                    ),
                    array (
                        'url' => '#',
                        'text' => 'FAQ',
                    ),
                    array (
                        'url' => '#',
                        'text' => 'LIÊN HỆ',
                    ),
                ),
            ),
        );

        $megamenu = array (
            'title' => 'SHOP',
            'link' => '#',
            'content' => '<ul><li><a href="#">Menu</a></li></ul>',
        );

        $product = array (
            'id' => '1',
            'title' => 'Lông mi gân lụa D1',
            'note' => 'Sản phẩm bán chạy nhất',
        );
        $options = [
            [
                'meta_key' => 'menu',
                'meta_value' => json_encode($menu)
            ],
            [
                'meta_key' => 'mega_menu',
                'meta_value' => json_encode($megamenu)
            ],
            [
                'meta_key' => 'mega_menu',
                'meta_value' => json_encode($megamenu)
            ],
            [
                'meta_key' => 'mega_menu',
                'meta_value' => json_encode($megamenu)
            ],
            [
                'meta_key' => 'mega_product',
                'meta_value' => json_encode($product)
            ],
            [
                'meta_key' => 'mega_product',
                'meta_value' => json_encode($product)
            ]
        ]

        DB::table('options')->insert($options);
    }
}
