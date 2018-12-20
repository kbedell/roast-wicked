<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipeTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipe_tags', function (Blueprint $table) {
            $table->integer('recipe_id')->unsigned()->index();
            $table->foreign('recipe_id')->references('id')->on('recipes')->onDelete('cascade');
            $table->integer('tag_id')->unsigned()->index();
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
            
            $table->index(['recipe_id', 'tag_id'], 'recipe_tag_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipe_tags');
    }
}
