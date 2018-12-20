<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateHeadingsToForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ingredients', function (Blueprint $table) {
            $table->dropColumn('ingredient_heading');

            $table->unsignedInteger('ingredient_heading_id');
        
            $table->foreign('ingredient_heading_id')->references('id')->on('ingredient_headings');

            $table->index(['id', 'ingredient_heading_id'], 'ingredient_heading_index');
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
            $table->string('ingredient_heading');

            $table->dropForeign(['ingredient_heading_id']);
            $table->dropIndex('ingredient_heading_index');

            $table->dropColumn('ingredient_heading_id');
        });
    }
}
