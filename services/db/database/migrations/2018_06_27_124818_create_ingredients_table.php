<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('recipe_id');
            $table->foreign('recipe_id')->references('id')->on('recipes')->onDelete('cascade');
            $table->string('ingredient_heading');
            $table->timestamps();

            $table->index(['id', 'recipe_id'], 'recipe_id_index');
            $table->index(['name'], 'ingredient_name_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredient');
    }
}
