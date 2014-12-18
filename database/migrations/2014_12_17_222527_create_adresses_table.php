<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdressesTable extends Migration {

	public function up()
	{
		Schema::create('adresses', function(Blueprint $table) {
			$table->string('ad1', 200)->index();
			$table->string('ad2', 200)->nullable();
			$table->string('cp', 5)->index();
			$table->string('ville', 100);
			$table->timestamps();
			$table->smallInteger('id', true);
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('adresses');
	}
}