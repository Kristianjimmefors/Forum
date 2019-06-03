<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,20) as $index) {
            DB::table('posts')->insert([
                'user_id' => $faker->numberBetween(1,10),
                'category_id' => $faker->numberBetween(1,10),
                'title' => $faker->word,
                'body' => $faker->paragraph,
                'created_at' => $faker->dateTime,

            ]);
        }
    }
}
