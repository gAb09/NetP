<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdressablesTable extends Migration {

	public function up()
	{
		Schema::create('adressables', function(Blueprint $table) {
			$table->increments('id');
			$table->smallInteger('adresse_id');
			$table->smallInteger('adressable_id')->index();
			$table->string('adressable_type', 50)->index();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('adressables');
	}
}