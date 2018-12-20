<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateStepHeadingsOnSteps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('steps', function (Blueprint $table) {
            $table->dropColumn('step_heading');

            $table->unsignedInteger('step_heading_id');
        
            $table->foreign('step_heading_id')->references('id')->on('step_headings');

            $table->index(['id', 'step_heading_id'], 'step_heading_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('steps', function (Blueprint $table) {
            $table->string('step_heading');

            $table->dropForeign(['step_heading_id']);
            $table->dropIndex('step_heading_index');

            $table->dropColumn('step_heading_id');
        });
    }
}
