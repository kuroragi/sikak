<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSbusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sbus', function (Blueprint $table) {
            $table->id();
            $table->string('kode_sbuhead');
            $table->text('ket');
            $table->string('satuan_slug');
            $table->bigInteger('harga');
            $table->integer('kali')->default(1);
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
        Schema::dropIfExists('sbus');
    }
}
