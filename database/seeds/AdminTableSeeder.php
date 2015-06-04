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
    }

}
