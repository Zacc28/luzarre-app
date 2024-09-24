<?php

namespace Database\Seeders;

use App\Models\ProductSize;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Product;

class ProductSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Hapus semua data yang ada di tabel product_sizes
        ProductSize::truncate();

        $faker = Faker::create();
        
        // Ambil produk dengan ID antara 8 dan 32 (Total 25 produk)
        $products = Product::whereBetween('id', [8, 32])->get();

        // Daftar ukuran tetap (5 ukuran per produk)
        $sizes = ['small', 'medium', 'large', 'x-large', 'xx-large'];

        foreach ($products as $product) {
            foreach ($sizes as $size) {
                // Buat entri baru di tabel product_sizes
                ProductSize::create([
                    'product_id' => $product->id,
                    'size' => $size,
                    'stock' => $size === 'xx-large' ? 0 : $faker->numberBetween(1, 100), // Stok 0 untuk xx-large, acak untuk yang lain
                ]);
            }
        }
    }
}
