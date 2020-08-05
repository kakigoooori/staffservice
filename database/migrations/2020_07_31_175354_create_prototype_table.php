<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrototypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        {
            Schema::create('prototype', function (Blueprint $table) {
                $table->increments('id');
                $table->string('entryday');
                $table->string('nickname');
                $table->string('name');
                $table->string('phonetic');
                $table->string('gender');
                $table->string('year');
                $table->string('month');
                $table->string('day');
                $table->string('zip01');
                $table->string('pref01');
                $table->string('addr01');
                $table->string('tel')->nullable();
                $table->string('mobiletel')->nullable();
                $table->string('email')->nullable();
                $table->string('mobilemail')->nullable();
                $table->string('job');
                $table->string('judge');
                $table->string('interviewday');
                $table->string('start_time');
                $table->string('end_time');
                $table->string('place');
                $table->string('note')->nullable();
        
                $table->timestamps();
            });
        }
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
