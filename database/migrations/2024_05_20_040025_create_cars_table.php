<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->default(1)->constrained('users')->onDelete('cascade');
            $table->string('nama');
            $table->string('alamat');
            $table->string('telp');
            $table->dateTime('tanggal');
            $table->integer('tahun');
            $table->string('keterangan');
            $table->string('sopir');
            $table->string('status')->default('Belum disetujui');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
};
