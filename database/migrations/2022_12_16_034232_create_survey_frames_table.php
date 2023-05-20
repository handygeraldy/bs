<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyFramesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_frames', function (Blueprint $table) {
            $table->id();
            $table->foreignId('survey_id')
            ->constrained();
            $table->smallInteger('year');
            $table->string('note');
            $table->timestamps();
            $table->softDeletes();

            $table->index('survey_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey_frames');
    }
}
