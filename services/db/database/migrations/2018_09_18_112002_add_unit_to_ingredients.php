<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUnitsToIngredients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ingredients', function (Blueprint $table) {
            $table->unsignedInteger('units_id');
            $table->foreign('units')->references('id')->on('units');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ingredients', function (Blueprint $table) {
            $table->dropForeign(['units_id']);
            $table->dropColumn('units_id');
        });
    }
}
