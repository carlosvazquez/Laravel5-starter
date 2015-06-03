<?php

use Illuminate\Database\Seeder;


class UserTableSeeder extends Seeder {
    public function run() {
        $faker = Faker\Factory::create();

        for ($i=0; $i < 10; $i++) {
            DB::table('users')->insert(array(
            'username'      => $faker->userName,
            'first_name'    => $faker->firstName,
            'last_name'     => $faker->lastName,
            'type'          => 'user',
            'email'         => $faker->email,
            'password'      => Hash::make('holamundo')
        ));
        }
    }

}
