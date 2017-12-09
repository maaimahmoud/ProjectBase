<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVIEWRATETable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('VIEW_RATE', function (Blueprint $table) {
            $table->timestamps();

            $table->foreign('Susername')
            ->references('username')->on('STUDENT')
            ->onDelete('cascade');

            $table->foreign('Pname')
            ->references('Name')->on('PROJECT')
            ->onDelete('cascade');

            $table->foreign('TID')
            ->references('TID')->on('PROJECT')
            ->onDelete('cascade');

            $table->primary(['Susername', 'Pname', 'TID']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('VIEW_RATE');
    }
}
