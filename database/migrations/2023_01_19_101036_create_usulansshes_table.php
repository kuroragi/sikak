<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsulansshesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usulansshes', function (Blueprint $table) {
            $table->id();
            $table->string('satuan_id');
            $table->string('name');
            $table->text('spek');
            $table->bigInteger('harga_std')->default(0);
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
        Schema::dropIfExists('usulansshes');
    }
}
