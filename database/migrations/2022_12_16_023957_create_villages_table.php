<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVillagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('villages', function (Blueprint $table) {
            $table->char('id', 10)->primary();
            $table->string('name', 50);
            $table->char('district_id', 7);
            $table->foreign('district_id')
            ->references('id')
            ->on('districts')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            
            $table->index('district_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('villages');
    }
}
