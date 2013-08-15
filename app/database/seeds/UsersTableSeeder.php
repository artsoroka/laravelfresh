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

				array('email' => 'someuser@gmail.com', 'password' => Hash::make('qwerty'), 'status' => 'active'),
				array('email' => 'manager@company.com', 'password' => Hash::make('qwerty'), 'status' => 'active')
		);  

		
		DB::table('users')->insert($users); 

	}

}
