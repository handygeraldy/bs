<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->char('nip', 18)->unique()->nullable();
            $table->string('email')->nullable();
            $table->string('username');
            $table->string('given_name', 50)->nullable();
            $table->string('family_name', 50)->nullable();
            $table->foreignId('role_id')
            ->constrained();
            $table->string('work_unit_regency_id', 4)->nullable();
            $table->string('photo', 255)->nullable();
            $table->bigInteger('created_by')->nullable();
            $table->text('logout_url')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('work_unit_regency_id')
                ->references('id')
                ->on('regencies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
