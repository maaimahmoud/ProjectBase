<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSTUDENTTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('STUDENT', function (Blueprint $table) {
            $table->string('email', 255)->nullable(false)->unique();
            $table->string('FirstName', 255)->nullable(false);
            $table->string('MiddleName', 255)->nullable(false);
            $table->string('LastName', 255)->nullable(false);
            $table->boolean('SEM/CREDIT')->nullable(false);
            $table->unsignedInteger('ExpectedGradYear')->nullable(false);
            $table->timestamps();

            $table->foreign('username')
            ->references('username')->on('USER')
            ->onDelete('cascade');

            $table->primary('username');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('STUDENT');
    }
}
