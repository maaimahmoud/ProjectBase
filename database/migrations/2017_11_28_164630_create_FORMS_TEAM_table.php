<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFORMSTEAMTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('FORMS_TEAM', function (Blueprint $table) {
            $table->timestamps();
            
            $table->foreign('Susername')
            ->references('username')->on('STUDENT')
            ->onDelete('cascade');

            $table->foreign('TID')
            ->references('TID')->on('TEAM')
            ->onDelete('cascade');

            $table->primary(['Susername', 'TID']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('FORMS_TEAM');
    }
}
