<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePROJECTTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PROJECT', function (Blueprint $table) {
            $table->string('Name', 255)->nullable(false);
            $table->string('Demo');
            $table->string('VideoLink');
            $table->string('Document');
            $table->timestamps();

            $table->foreign('Ccode')
            ->references('Ccode')->on('PROJECT_REQUIREMENT')
            ->onDelete('noaction');

            $table->foreign('Year')
            ->references('Year')->on('PROJECT_REQUIREMENT')
            ->onDelete('cascade');

            $table->foreign('TID')
            ->references('ID')->on('TEAM')
            ->onDelete('cascade');

            $table->foreign('Supervisor')
            ->references('ID')->on('INSTRUCTOR')
            ->onDelete('cascade');

            $table->primary(['Name', 'TID']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('PROJECT');
    }
}
