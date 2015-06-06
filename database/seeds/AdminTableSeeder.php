<?php

use Illuminate\Database\Seeder;


class AdminTableSeeder extends Seeder {
    public function run() {
        DB::table('users')->insert(array(
            'username' => 'carlosvazquez',
            'first_name' => 'Carlos',
            'last_name' => 'Vazquez',
            'type'      => 'admin',
            'email' => 'admin@outlook.com',
            'password' => Hash::make('demo123')
        ));
        DB::table('users')->insert(array(
            'username' => 'gsalazarh',
            'first_name' => 'Gustavo',
            'last_name' => 'Salazar',
            'type'      => 'admin',
            'email' => 'gsalazarh@live.com.mx',
            'password' => Hash::make('demo123')
        ));


    }

}
