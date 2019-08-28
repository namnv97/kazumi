<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $roles = array(
        	[
        		'name' => 'SuperAdmin',
        		'slug' => 'superadmin',
        		'description' => 'SuperAdmin Role'
        	],
        	[
        		'name' => 'Admin',
        		'slug' => 'admin',
        		'description' => 'Admin Role'
        	],
        	[
        		'name' => 'User',
        		'slug' => 'user',
        		'description' => 'User Role'
        	]
        );

        DB::table('roles')->insert($roles);
    }
}
