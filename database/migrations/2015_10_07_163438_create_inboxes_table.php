<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInboxesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('inboxes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('read');
			$table->string('message');
			$table->integer('from_id');
			$table->integer('to_id');
			$table->integer('group_id');
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
		Schema::drop('inboxes');
	}

}
