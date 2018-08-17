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
    		'name' => 'Admin',
    		'email' => 'admin@example.com',
    		'password' => bcrypt('1234pass'),
    		'admin' => true,
    	]);

      DB::table('users')->insert([
    		'name' => 'Beth Salvatore',
    		'email' => 'bethsalvatore2018@gmail.com',
    		'password' => bcrypt('1234pass'),
    		'admin' => true,
    	]);
    }
}
