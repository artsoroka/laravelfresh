<?php

class ItemsTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$items = array(

				array('category_id' => '1', 'company_id' => 1, 'title' => 'Muffins', 'description' => 'Fresh and tasty', 
					'start_date' => time(), 'end_date' => time() + 30 * 24, 'price' => 100)
		);  

		
		DB::table('items')->insert($items); 

	}

}