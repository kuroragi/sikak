<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kaks', function (Blueprint $table) {
            $table->id();
            $table->string('kode_subkeg');
            $table->string('kode');
            $table->string('kelompokbelanja_id')->nullable();
            $table->string('pencetuskebe_id')->nullable();
            $table->string('ket')->nullable();
            $table->string('icapaianprog')->nullable();
            $table->string('volcapprog')->nullable();
            $table->string('satcapprog')->nullable();
            $table->string('ikeluarankeg')->nullable();
            $table->string('volkelkeg')->nullable();
            $table->string('satkelkeg')->nullable();
            $table->string('ihaskeg')->nullable();
            $table->string('volhaskeg')->nullable();
            $table->string('sathaskeg')->nullable();
            $table->string('tarsubkeg')->nullable();
            $table->string('outakti')->nullable();
            $table->string('voloutakti')->nullable();
            $table->string('satoutakti')->nullable();
            $table->string('bidang_sekretariat')->nullable();
            $table->string('subbagdkk')->nullable();
            $table->date('dari')->nullable();
            $table->date('sampai')->nullable();
            $table->text('deskrip')->nullable();
            $table->string('sumberdana')->nullable();
            $table->string('kode_skpd')->nullable();
            $table->string('kode_sub')->nullable();
            $table->string('username')->nullable();
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
        Schema::dropIfExists('kaks');
    }
}
