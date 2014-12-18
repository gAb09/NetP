<?php

class AdresseTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('adresses')->delete();

		// adresses
		Adresse::create(array(
				'ad1' => AD1,
				'ad2' => AD2,
				'cp' => 09000,
				'ville' => VILLE,
				'id' => 1
			));

		// adresses
		Adresse::create(array(
				'ad1' => ad1,
				'ad2' => ad2,
				'cp' => 09001,
				'ville' => ville,
				'id' => 2
			));
	}
}