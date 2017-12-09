<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDEPARTMENTTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DEPARTMENT', function (Blueprint $table) {
            $table->string('Code', 15)->nullable(false)->unique();
            $table->string('Name', 256)->nullable(false);
            $table->string('Description');
            $table->timestamps();

            $table->foreign('DeptChair')
            ->references('ID')->on('INSTRUCTOR')
            ->onDelete('noaction');

            $table->primary('Code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('DEPARTMENT');
    }
}
