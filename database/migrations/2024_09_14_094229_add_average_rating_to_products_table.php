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
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('average_rating', 3, 2)->nullable()->after('stock'); // Atur kolom ditempatkan setelah 'stock'
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('average_rating'); // Jika di-rollback, kolom ini akan dihapus
        });
    }

};
