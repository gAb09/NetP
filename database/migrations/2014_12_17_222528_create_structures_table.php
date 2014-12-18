<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStructuresTable extends Migration {

	public function up()
	{
		Schema::create('structures', function(Blueprint $table) {
			$table->smallInteger('id', true)->index();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('structures');
	}
}