<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTEAMTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TEAM', function (Blueprint $table) {
            $table->unsignedInteger('ID')->nullable(false)->unique();
            $table->string('Name', 256)->nullable(false);
            $table->unsignedInteger('NoOfMembers')->nullable(false);
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
        Schema::dropIfExists('TEAM');
    }
}
