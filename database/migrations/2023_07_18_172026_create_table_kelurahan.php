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
        Schema::create('table_kelurahan', function (Blueprint $table) {
            $table->increments('id_kelurahan');
            $table->string('nama_kelurahan',100);
            $table->string('nama_kecamatan',100);
            $table->string('nama_kota',100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_kelurahan');
    }
};
