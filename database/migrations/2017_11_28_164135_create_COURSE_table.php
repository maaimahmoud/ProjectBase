<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCOURSETable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('COURSE', function (Blueprint $table) {
            $table->string('Code', 15)->nullable(false)->unique();
            $table->string('Name', 256)->nullable(false);
            $table->string('Description');
            $table->timestamps();

            $table->foreign('DeptCode')
            ->references('code')->on('DEPARTMENT')
            ->onDelete('cascade');

            $table->primary('code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('COURSE');
    }
}
