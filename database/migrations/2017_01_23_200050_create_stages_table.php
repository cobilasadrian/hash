<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('i');
            $table->integer('j');
            $table->integer('k');
            $table->integer('l');
            $table->integer('m');
            $table->integer('n');
            $table->integer('o');
            $table->integer('p');
            $table->integer('q');
            $table->integer('r');
            $table->integer('s');
            $table->integer('t');
            $table->integer('u');
            $table->integer('v');
            $table->integer('w');
            $table->integer('x');
            $table->integer('nr');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stages');
    }
}
