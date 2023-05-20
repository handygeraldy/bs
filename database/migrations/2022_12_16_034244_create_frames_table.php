<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFramesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frames', function (Blueprint $table) {
            $table->id();
            $table->foreignId('survey_frame_id')
                ->constrained();
            $table->foreignId('period_id')
                ->constrained();
            $table->string('bs', 20);
            $table->char('village_id', 10);
            $table->foreignId('strata_id')
                ->constrained();
            $table->string('nks', 10);
            $table->string('klas', 1);
            $table->integer('muatan');
            $table->float('random');

            $table->foreign('village_id')
                ->references('id')
                ->on('villages')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->index('survey_frame_id');
            $table->index('period_id');
            $table->index('village_id');
            $table->index('strata_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('frames');
    }
}
