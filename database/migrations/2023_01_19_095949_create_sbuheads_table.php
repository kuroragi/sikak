<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSbuheadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sbuheads', function (Blueprint $table) {
            $table->id();
            $table->string('kode_head');
            $table->string('kode_parent')->nullable();
            $table->text('ket');
            $table->integer('tingkat');
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
        Schema::dropIfExists('sbuheads');
    }
}
