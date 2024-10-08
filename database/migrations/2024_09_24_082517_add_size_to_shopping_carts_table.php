<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('shopping_carts', function (Blueprint $table) {
            $table->string('size')->after('product_id'); // Menambahkan kolom size setelah product_id
        });
    }
    
    public function down()
    {
        Schema::table('shopping_carts', function (Blueprint $table) {
            $table->dropColumn('size');
        });
    }
    
};
