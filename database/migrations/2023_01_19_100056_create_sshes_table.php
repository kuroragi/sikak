<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSshesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sshes', function (Blueprint $table) {
            $table->id();
            $table->integer('kode');
            $table->string('satuan_id');
            $table->string('ket');
            $table->text('spek');
            $table->string('harga_std')->default(0);
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
        Schema::dropIfExists('sshes');
    }
}
