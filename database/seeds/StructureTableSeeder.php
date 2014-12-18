<?php

class StructureTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('structures')->delete();

		// structure1
		Structure::create(array(
				'id' => 1
			));

		// structure2
		Structure::create(array(
				'id' => 2
			));
	}
}