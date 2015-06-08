<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
		$this->call('AdminTableSeeder');
		$this->call('UserTableSeeder');
        $this->call('InstallTableSeeder');
		$this->call('AreaTableSeeder');
		$this->call('DivisionTableSeeder');
		$this->call('RoleTableSeeder');
		$this->call('UserRoleTableSeeder');
        $this->call('StatusTableSeeder');

		#$this->call('PageTableSeeder');
	}

}
