<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnStartAndEndPeriodeToKelompokBelanjaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kelompokbelanjas', function (Blueprint $table) {
            $table->year('start_periode')->nullable()->default('2023');
            $table->year('end_periode')->nullable();
            $table->boolean('is_kak')->default(true);
            $table->boolean('is_satuan_needed')->default(false);
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
            $table->dropColumn('start_periode');
            $table->dropColumn('end_periode');
            $table->dropColumn('is_kak');
            $table->dropColumn('is_satuan_needed');
        });
    }
}
