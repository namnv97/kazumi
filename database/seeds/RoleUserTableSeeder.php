<?php

use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = array(
        	[
        		'user_id' => 1,
        		'role_id' => 1
        	],
        	[
        		'user_id' => 2,
        		'role_id' => 2
        	],
        	[
        		'user_id' => 3,
        		'role_id' => 3
        	]
        );

        DB::table('role_user')->insert($arr);
    }
}
