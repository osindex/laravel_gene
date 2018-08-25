<?php

use App\User;
use Illuminate\Database\Seeder;

class Init extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		if (User::count() < 1) {
			$count = 1;
		} else {
			$count = 15;
		}
		for ($i = 0; $i < $count; $i++) {
			User::create(['email' => mt_rand(1, 1000) . '@admin.com', 'password' => 'password', 'name' => mt_rand(1, 1000) . 'admin']);
		}
	}
}
