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
        Schema::create('finances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->default(1)->constrained('users')->onDelete('cascade');
            $table->date('tanggal');
            $table->string('bulan');
            $table->integer('tahun');
            $table->string('keterangan');
            $table->bigInteger('masuk')->default(0);
            $table->bigInteger('keluar')->default(0);
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
        Schema::dropIfExists('finances');
    }
};
