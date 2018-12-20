<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitsConversionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units_conversions', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('from_amount', 8, 2);
            $table->unsignedInteger('from_unit_id');
            $table->foreign('from_unit_id')->references('id')->on('units');
            $table->decimal('to_amount', 8, 2);
            $table->unsignedInteger('to_unit_id');
            $table->foreign('to_unit_id')->references('id')->on('units');
            
            $table->index(['id', 'from_unit_id'], 'from_unit_index');
            $table->index(['id', 'to_unit_id'], 'from_unit_index');
            $table->index(['from_unit_id', 'to_unit_id'], 'conversion_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('units_conversions');
    }
}
