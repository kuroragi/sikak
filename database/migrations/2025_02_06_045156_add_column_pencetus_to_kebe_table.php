<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnPencetusToKebeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kelompokbelanjas', function (Blueprint $table) {
            $table->boolean('is_pencetus')->default(false)->after('is_satuan_needed');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kelompokbelanjas', function (Blueprint $table) {
            $table->dropColumn('is_pencetus');
        });
    }
}
