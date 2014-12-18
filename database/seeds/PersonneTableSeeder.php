<?php

class PersonneTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('personnes')->delete();

		// personne1
		Personne::create(array(
				'id' => 1,
				'Nom' => Nom1,
				'Prenom' => Prénom1
			));

		// personne2
		Personne::create(array(
				'id' => 2,
				'Nom' => Nom2,
				'Prenom' => Prénom2
			));
	}
}