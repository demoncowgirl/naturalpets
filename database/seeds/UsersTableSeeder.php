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
    		'name' => 'Ellie Mae',
    		'email' => 'elliemae@example.com',
    		'password' => bcrypt('password'),
    		'admin' => true,
    	]);
    }
}
