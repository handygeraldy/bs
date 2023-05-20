<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('districts', function (Blueprint $table) {
            $table->char('id', 7)->primary();
            $table->string('name', 50);
            $table->char('regency_id', 4);
            $table->foreign('regency_id')
            ->references('id')
            ->on('regencies')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            
            $table->index('regency_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('districts');
    }
}
