<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubkegsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subkegs', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('kode_kegprog');
            $table->text('ket');
            $table->text('kinerja');
            $table->text('indikator');
            $table->integer('satuan_id');
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
        Schema::dropIfExists('subkegs');
    }
}
