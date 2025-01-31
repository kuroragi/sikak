<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAktivitasKaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aktivitas_kaks', function (Blueprint $table) {
            $table->id();
            $table->string('kode_thp');
            $table->string('kode');
            $table->string('ket');
            $table->integer('bulandari')->default(1);
            $table->integer('minggudari')->default(1);
            $table->integer('bulansampai')->default(1);
            $table->integer('minggusampai')->default(1);
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
        Schema::dropIfExists('aktivitas_kaks');
    }
}
