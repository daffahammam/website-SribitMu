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
        Schema::create('fitris', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->default(1)->constrained('users')->onDelete('cascade');
            $table->date('tanggal');
            $table->integer('tahun');
            $table->string('nama');
            $table->string('alamat');
            $table->integer('uang');
            $table->integer('beras');
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
        Schema::dropIfExists('fitris');
    }
};
