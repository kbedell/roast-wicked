<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitAliasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unit_alias', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('unit_id');
            $table->foreign('unit_id')->references('id')->on('units');
            $table->string('alias');

            $table->index(['unit_id', 'alias'], 'unit_alias_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unit_alias');
    }
}
