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
        Schema::create('qurbans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->default(1)->constrained('users')->onDelete('cascade');
            $table->string('nama');
            $table->string('alamat');
            $table->string('hewan');
            $table->string('kelompok');
            $table->date('tanggal');
            $table->integer('tahun');
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
        Schema::dropIfExists('qurbans');
    }
};
