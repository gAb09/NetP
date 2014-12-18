<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePersonnesTable extends Migration {

	public function up()
	{
		Schema::create('personnes', function(Blueprint $table) {
			$table->smallInteger('id', true);
			$table->string('Nom', 200);
			$table->string('Prenom', 100);
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('personnes');
	}
}