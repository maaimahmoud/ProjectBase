<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateADMINMANAGESTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ADMIN_MANAGES', function (Blueprint $table) {
            $table->timestamps();

            $table->foreign('Ausername')
            ->references('username')->on('ADMIN')
            ->onDelete('cascade');

            $table->foreign('Year')
            ->references('Year')->on('PROJECT_REQUIREMENT')
            ->onDelete('cascade');

            $table->foreign('Ccode')
            ->references('Ccode')->on('PROJECT_REQUIREMENT')
            ->onDelete('cascade');

            $table->priamry(['Ausername', 'Year', 'Ccode']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ADMIN_MANAGES');
    }
}
