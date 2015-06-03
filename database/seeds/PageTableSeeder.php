<?php

use Illuminate\Database\Seeder;


class PageTableSeeder extends Seeder {
    public function run() {
        $faker = Faker\Factory::create();

        for ($i=0; $i < 10; $i++) {
            DB::table('pages')->insert(array(
                'title'             => 'carlosvazquez',
                'slug'              => 'Carlos'.$i,
                'content'           => 'Vazquez',
                'meta-description'  => 'carlosvazquez@outlook.com',
                'meta-og'           => 'carlosvazquez@outlook.com',
                'meta-twitter'      => 'carlosvazquez@outlook.com',
                'published_at'      => 'carlosvazquez@outlook.com',
            ));
        }
    }

}
