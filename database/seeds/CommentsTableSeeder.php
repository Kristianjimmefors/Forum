<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,40) as $index) {
            DB::table('comments')->insert([
                'post_id' => $faker->numberBetween(1,20),
                'user_id' => $faker->numberBetween(1,10),
                'comment' => $faker->paragraph,
                'created_at' => $faker->dateTime,
            ]);
        }
    }
}
