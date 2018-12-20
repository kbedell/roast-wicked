<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('steps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('step_number');
            $table->longText('step');
            $table->unsignedInteger('recipe_id');
            $table->foreign('recipe_id')->references('id')->on('recipes')->onDelete('cascade');
            $table->string('step_heading');
            $table->timestamps();

            $table->index(['id', 'recipe_id'], 'recipe_id_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('steps');
    }
}
