<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client', function (Blueprint $table) {
            $table->increments('id');
            $table->string('start');
            $table->string('end');
            $table->string('name');
            $table->string('name_kana');
            $table->string('email');
            $table->string('office_name');
            $table->string('add01');
            $table->string('add02');
            $table->string('add03');
            $table->integer('tel');
            $table->string('url');
            $table->string('date');
            $table->string('genre');
            $table->string('note');
    
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
        //
    }
}
