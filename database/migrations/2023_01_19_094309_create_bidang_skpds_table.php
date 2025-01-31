<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBidangSkpdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bidang_skpds', function (Blueprint $table) {
            $table->id();
            $table->string('kode_skpd');
            $table->string('kode_bidurus');
            $table->year('thn_awal')->nullable();
            $table->year('thn_akhir')->nullable();
            $table->integer('status');
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
        Schema::dropIfExists('bidang_skpds');
    }
}
