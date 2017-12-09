<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePROJECTREQUIREMENTTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PROJECT_REQUIREMENT', function (Blueprint $table) {
            $table->string('Name')->nullable(false);
            $table->unsignedInteger('Year')->nullable(false);
            $table->string('Description');
            $table->timestamps();

            $table->foreign('Ccode')
            ->references('code')->on('COURSE')
            ->onDelete('cascade');

            $table->primary(['Ccode', 'Year']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('PROJECT_REQUIREMENT');
    }
}
