<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKebutuhanaktsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kebutuhanakts', function (Blueprint $table) {
            $table->id();
            $table->string('kode_keb');
            $table->integer('tipekeb');
            $table->string('kode_kak');
            $table->string('kode_akt')->nullable();
            $table->string('uraian_lain')->nullable();
            $table->string('kode_item')->nullable();
            $table->string('satuan_id')->nullable();
            $table->integer('rka_tipe')->default(0);
            $table->text('alasan_rka')->nullable();
            $table->decimal('jml_rka',20,2)->nullable();
            $table->bigInteger('harga_rka')->nullable();
            $table->bigInteger('total_rka');
            $table->integer('kuappas_tipe')->default(0);
            $table->text('alasan_kuappas')->nullable();
            $table->decimal('jml_kuappas',20,2)->nullable();
            $table->bigInteger('harga_kuappas')->nullable();
            $table->bigInteger('total_kuappas');
            $table->integer('apbd_tipe')->default(0);
            $table->text('alasan_apbd')->nullable();
            $table->decimal('jml_apbd',20,2)->nullable();
            $table->bigInteger('harga_apbd')->nullable();
            $table->bigInteger('total_apbd');
            $table->integer('final_tipe')->default(0);
            $table->text('alasan_final')->nullable();
            $table->decimal('jml_final',20,2)->nullable();
            $table->bigInteger('harga_final')->nullable();
            $table->bigInteger('total_final');
            $table->year('periode');
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
        Schema::dropIfExists('kebutuhanakts');
    }
}
