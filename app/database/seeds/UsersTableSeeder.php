<?php

class UsersTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$users = array(

				array('email' => 'someuser@gmail.com', 'password' => Hash::make('qwerty'), 'status' => 'active', 'role' => 'user'),
				array('email' => 'manager@company.com', 'password' => Hash::make('qwerty'), 'status' => 'active', 'role' => 'manager')
		);  

		
		DB::table('users')->insert($users); 

	}

}
