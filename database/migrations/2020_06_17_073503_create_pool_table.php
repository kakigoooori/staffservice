<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pool', function (Blueprint $table) {
            $table->increments('id');
            $table->string('work');
            $table->integer('price');
            $table->string('genre');
            $table->string('start');
            $table->string('end');
            $table->string('worknote');
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
        Schema::dropIfExists('pool');
    }
}
