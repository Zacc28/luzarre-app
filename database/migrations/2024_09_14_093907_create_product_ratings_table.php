<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Rating harus dikaitkan dengan user
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade'); // Rating terkait dengan produk
            $table->unsignedTinyInteger('rating')->nullable(); // Rating berupa angka, nullable
            $table->text('review')->nullable(); // Bisa tambahkan review sebagai teks opsional
            $table->timestamps();

             // Foreign key untuk produk
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_ratings');
    }
};
