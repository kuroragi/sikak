<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTahapKaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tahap_kaks', function (Blueprint $table) {
            $table->id();
            $table->string('kode_kak');
            $table->string('kode');
            $table->string('ket');
            $table->integer('tipe_rka')->default(0);
            $table->text('alasan_rka')->nullable();
            $table->integer('tipe_kuappas')->default(0);
            $table->text('alasan_kuappas')->nullable();
            $table->integer('tipe_apbd')->default(0);
            $table->text('alasan_apbd')->nullable();
            $table->integer('tipe_final')->default(0);
            $table->text('alasan_final')->nullable();
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
        Schema::dropIfExists('tahap_kaks');
    }
}
