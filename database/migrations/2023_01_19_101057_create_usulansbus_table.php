<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsulansbusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usulansbus', function (Blueprint $table) {
            $table->id();
            $table->text('ket');
            $table->string('satuan_id');
            $table->bigInteger('harga')->default(0);
            $table->integer('kali');
            $table->string('kode_skpd')->nullable();
            $table->string('kode_sub')->nullable();
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
        Schema::dropIfExists('usulansbus');
    }
}
