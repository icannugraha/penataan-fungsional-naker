<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
	        [
	            'name' => 'Admin',
	            'email' => 'admin@naker.xyz',
	            'password' => bcrypt('admin123'),
	            'is_admin' => 1,
	        ],
	        [
	            'name' => 'User',
	            'email' => 'user@naker.xyz',
	            'password' => bcrypt('user123'),
	            'is_admin' => 0,
	        ],
        ]);
    }
}
