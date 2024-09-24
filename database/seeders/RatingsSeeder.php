<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class RatingsSeeder extends Seeder
{
    public function run()
    {
        // Menghapus data ratings yang ada
        DB::table('ratings')->truncate();

        $faker = Faker::create();

        for ($productId = 8; $productId <= 32; $productId++) {
            DB::table('ratings')->insert([
                'user_id' => 1,
                'product_id' => $productId,
                'rating' => rand(4, 5), // Random rating between 4 and 5
                'review' => $faker->sentence(10), // Random review with 10 words
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
