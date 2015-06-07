<?php

use Illuminate\Database\Seeder;


class AdminTableSeeder extends Seeder {
    public function run() {
        DB::table('users')->insert(array(
            'username' => 'admin',
            'first_name' => 'Carlos',
            'last_name' => 'Vazquez',
            'type'      => 'admin',
            'email' => 'admin@outlook.com',
            'actived'   => '1',
            'password' => Hash::make('demo123')
        ));
        DB::table('users')->insert(array(
            'username' => 'manager',
            'first_name' => 'Gustavo',
            'last_name' => 'Salazar',
            'type'      => 'manager',
            'email' => 'gsalazarh@live.com.mx',
            'actived'   => '1',
            'password' => Hash::make('demo123')
        ));


    }

}
