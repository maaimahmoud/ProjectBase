<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePHOTOSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PHOTOS', function (Blueprint $table) {
            $table->string('Photos');
            $table->timestamps();

            $table->foreign('Pname')
            ->references('Name')->on('PROJECT')
            ->onDelete('cascade');

            $table->foreign('TID')
            ->references('TID')->on('PROJECT')
            ->onDelete('cascade');

            $table->primary(['Pname', 'TID', 'Photos']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('PHOTOS');
    }
}
