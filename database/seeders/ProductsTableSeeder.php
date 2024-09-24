<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Loop untuk membuat 25 data
        for ($i = 0; $i < 25; $i++) {
            DB::table('products')->insert([
                'name' => $faker->word,
                'description' => $faker->sentence,
                'price' => $faker->randomFloat(2, 100000, 900000), // Harga acak dengan 2 desimal antara 10,000 dan 100,000
                'stock' => $faker->numberBetween(10, 100), // Stock acak antara 10 dan 100
                'category_id' => $faker->numberBetween(1, 3), // Mengasumsikan ada 10 kategori
                'campaign_id' => $faker->numberBetween(1, 4), // Mengasumsikan ada 5 campaign
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
