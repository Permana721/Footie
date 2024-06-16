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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sku');
            $table->string('nama_product');
            $table->string('link');
            $table->string('deskripsi', 2550);
            $table->string('category');
            $table->string('tipe');
            $table->string('alamat_penjual');
            $table->string('halal');
            $table->string('harga');
            $table->double('discount');
            $table->string('foto');
            $table->tinyInteger('is_active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

