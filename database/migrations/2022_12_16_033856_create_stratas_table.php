<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStratasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stratas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('survey_id')
            ->constrained();
            $table->string('group', 2);
            $table->string('code', 2);
            $table->string('name', 100);

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
        Schema::dropIfExists('stratas');
    }
}
