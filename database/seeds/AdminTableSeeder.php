<?php

use Illuminate\Database\Seeder;


class AdminTableSeeder extends Seeder {
    public function run() {
        DB::table('users')->insert(array(
            'empleado'  =>  '1',
            'username' => 'admin',
            'first_name' => 'Carlos',
            'last_name' => 'Vazquez',
            'email' => 'admin@outlook.com',
            'password' => Hash::make('demo123'),
            'type'      => 'admin',
            'actived'   => '1'
        ));
        DB::table('users')->insert(array(
            'empleado'  =>  '2',
            'username' => 'manager',
            'first_name' => 'Gustavo',
            'last_name' => 'Salazar',
            'email' => 'gsalazarh@live.com.mx',
            'password' => Hash::make('demo123'),
            'type'      => 'supervisor',
            'actived'   => '1'
        ));


    }

}
