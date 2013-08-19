<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('items', function(Blueprint $table)
		{
			$table->increments('id');
			
			$table->integer('category_id');
			$table->integer('company_id');
			
			$table->string('title');
			$table->text('description'); 
			$table->text('image'); 
			$table->string('status'); 
			
			$table->integer('start_date');
			$table->integer('end_date');

			$table->integer('price');
			$table->integer('address_id'); 
			
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('items');
	}

}
