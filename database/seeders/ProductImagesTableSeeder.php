<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductImage;
use Carbon\Carbon;

class ProductImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus semua data yang ada di tabel product_images
        ProductImage::truncate();

        // List of product numbers
        $productNumbers = [1, 2, 3];

        // Loop untuk setiap product_id dari 8 hingga 32
        for ($productId = 8; $productId <= 32; $productId++) {
            // Pilih satu nomor product secara random (1, 2, atau 3)
            $productNumber = $productNumbers[array_rand($productNumbers)];

            // Loop untuk setiap gambar (1 hingga 5) per produk
            for ($imageIndex = 1; $imageIndex <= 6; $imageIndex++) {
                // Tentukan nama file gambar berdasarkan productNumber dan nomor gambar
                $imageUrl = "product-{$productNumber}_{$imageIndex}.jpg";

                // Tentukan tipe gambar berdasarkan nomor gambar
                $type = $this->getImageType($imageIndex);

                // Insert ke dalam tabel product_images
                ProductImage::create([
                    'product_id' => $productId,
                    'image_url'  => $imageUrl,
                    'type'       => $type,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
    }

    /**
     * Menentukan tipe gambar berdasarkan index gambar.
     *
     * @param int $imageIndex
     * @return string
     */
    private function getImageType(int $imageIndex): string
    {
        switch ($imageIndex) {
            case 1:
                return 'cover';
            case 2:
                return 'hover';
            case 6:
                return 'thumbnail';
            default:
                return 'additional';
        }
    }
}
