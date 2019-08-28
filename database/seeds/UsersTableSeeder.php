<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array(
    		[
    			'name' => 'Administrator',
    			'email' => 'admin@127.0.0.1',
    			'password' => Hash::make('admin123'),
    			'point_reward' => 100,
    			'refferal_code' => str_random(10),
    			'avatar' => '/assets/admin/img/logo.png'
    		],
    		[
    			'name' => 'Nam Nguyễn',
    			'email' => 'n4m.nv.1997@gmail.com',
    			'password' => Hash::make('admin123'),
    			'point_reward' => 100,
    			'refferal_code' => str_random(10),
    			'avatar' => null
    		],
    		[
    			'name' => 'Pveser',
    			'email' => 'info@pveser.com',
    			'password' => Hash::make('admin123'),
    			'point_reward' => 100,
    			'refferal_code' => str_random(10),
    			'avatar' => null
    		]
    	);
        DB::table('users')->insert($users);

        $rewards = array(
        	[
        		'user_id' => 1,
        		'point' => 100,
        		'action' => 'Tạo mới tài khoản',
        		'status' => 'approved'
        	],
        	[
        		'user_id' => 2,
        		'point' => 100,
        		'action' => 'Tạo mới tài khoản',
        		'status' => 'approved'
        	],
        	[
        		'user_id' => 3,
        		'point' => 100,
        		'action' => 'Tạo mới tài khoản',
        		'status' => 'approved'
        	],
        );

        DB::table('history_reward')->insert($rewards);
    }
}
