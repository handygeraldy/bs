<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReplacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('replaces', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sampling_id')
                ->constrained();
            $table->unsignedBigInteger('old_bs');
            $table->unsignedBigInteger('new_bs');
            $table->foreign('old_bs')
                ->references('id')
                ->on('frames')
                ->constrained();
            $table->foreign('new_bs')
                ->references('id')
                ->on('frames')
                ->constrained();
            $table->foreignId('replace_reason_id')->constrained();
            $table->text('note');
            $table->foreignId('status_id')->constrained();
            $table->foreignId('release_id')->nullable()
            ->constrained();
            $table->timestamps();
            
            $table->index('status_id');
            $table->index('release_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('replaces');
    }
}
