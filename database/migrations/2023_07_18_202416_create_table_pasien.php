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
        Schema::create('table_pasien', function (Blueprint $table) {
            $table->string('id_pasien',100);
            $table->string('nama',100);
            $table->string('alamat',100);
            $table->string('no_telepon',100);
            $table->string('rt_rw',100);
            $table->string('id_kelurahan',100);
            $table->date('tanggal_lahir',100);
            $table->string('jenis_kelamin',100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_pasien');
    }
};
