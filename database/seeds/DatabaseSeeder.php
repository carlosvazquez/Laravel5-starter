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
        $this->call('AreaTableSeeder');
        $this->call('DivisionTableSeeder');
        $this->call('StatusTableSeeder');
		$this->call('AdminTableSeeder');
		#$this->call('UserTableSeeder');
        $this->call('RoleTableSeeder');
        #$this->call('UserRoleTableSeeder');
        #$this->call('InstallTableSeeder');
		#$this->call('PageTableSeeder');
        $this->call('PermissionsTableSeeder');
        $this->call('PermissionRoleTableSeeder');
	}

}
