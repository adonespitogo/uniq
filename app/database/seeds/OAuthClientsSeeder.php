<?php

class OAuthClientsSeeder extends Seeder {

	public function run() {
		DB::table('oauth_clients')->insert([
			'id' => 'UNIQANDROID',
			'secret' => 'imc3bu',
			'name' => 'Uniq Android'
			]);
	}

}
