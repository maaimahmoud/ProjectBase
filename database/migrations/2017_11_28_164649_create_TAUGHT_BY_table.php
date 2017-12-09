<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTAUGHTBYTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TAUGHT_BY', function (Blueprint $table) {
            $table->unsignedInteger('Year')->nullable(false);
            $table->timestamps();
            
            $table->foreign('IID')
            ->references('ID')->on('INSTRUCTOR')
            ->onDelete('cascade');

            $table->foreign('Ccode')
            ->references('code')->on('COURSE')
            ->onDelete('cascade');

            $table->primary(['Ccode', 'IID', 'Year']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('TAUGHT_BY');
    }
}
