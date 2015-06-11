<?php

use Illuminate\Database\Seeder;


class UserTableSeeder extends Seeder {
    public function run() {

        DB::table('users')->insert(array(
            'username' => 'supervisor',
            'first_name' => 'Pedro',
            'last_name' => 'Garcia',
            'email' => 'supervision@eistel.mx',
            'password' => Hash::make('demo123'),
            'type'      => 'supervisor',
            'actived'   => '1',
        ));
        DB::table('users')->insert(array(
            'username' => 'tecnico',
            'first_name' => 'Juan',
            'last_name' => 'Sanchez',
            'email' => 'tecnico@eistel.mx',
            'password' => Hash::make('demo123'),
            'type'      => 'tecnico',
            'actived'   => '1',
        ));

    }

}
