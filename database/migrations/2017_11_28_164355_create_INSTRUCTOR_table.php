<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateINSTRUCTORTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('INSTRUCTOR', function (Blueprint $table) {
            $table->string('ID')->nullable(false)->unique();
            $table->boolean('TA/DR')->nullable(false);
            $table->string('Description');
            $table->string('Link To Profile');
            $table->timestamps();

            $table->primary('ID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('INSTRUCTOR');
    }
}
