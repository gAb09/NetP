<?php

class DatabaseSeeder extends Seeder {

	public function run()
	{
		Eloquent::unguard();

		$this->call('AdresseTableSeeder');
		$this->command->info('Adresse table seeded!');

		$this->call('PersonneTableSeeder');
		$this->command->info('Personne table seeded!');

		$this->call('StructureTableSeeder');
		$this->command->info('Structure table seeded!');
	}
}