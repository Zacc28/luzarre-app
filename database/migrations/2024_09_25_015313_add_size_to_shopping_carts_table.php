<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSizeToShoppingCartsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('shopping_carts', function (Blueprint $table) {
            $table->string('size')->after('product_id'); // Add the size column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('shopping_carts', function (Blueprint $table) {
            $table->dropColumn('size'); // Drop the size column
        });
    }
}
