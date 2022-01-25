<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangesForeignkeyToConstrainedOnShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shops', function (Blueprint $table) {
            $table->foreignId('area_id')->references('id')->on('areas')->change();
            $table->foreignId('genre_id')->references('id')->on('genres')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shops', function (Blueprint $table) {
            $table->foreignId('area_id')->constrained(false)->change();
            $table->foreignId('genre_id')->constrained(false)->change();
        });
    }
}
