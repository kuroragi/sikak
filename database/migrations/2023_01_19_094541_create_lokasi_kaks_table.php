<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLokasiKaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lokasi_kaks', function (Blueprint $table) {
            $table->id();
            $table->integer('base_lokasi');
            $table->string('kode_kak')->nullable();
            $table->string('kode_akt')->nullable();
            $table->string('kecamatan_id')->nullable();
            $table->string('kelurahan_id')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('ltd')->nullable();
            $table->string('lgt')->nullable();
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
        Schema::dropIfExists('lokasi_kaks');
    }
}
