<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTOOLSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TOOLS', function (Blueprint $table) {
            $table->string('Tools');
            $table->timestamps();

            $table->foreign('Pname')
            ->references('Name')->on('PROJECT')
            ->onDelete('cascade');

            $table->foreign('TID')
            ->references('TID')->on('PROJECT')
            ->onDelete('cascade');

            $table->primary(['Pname', 'TID', 'Tools']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('TOOLS');
    }
}
