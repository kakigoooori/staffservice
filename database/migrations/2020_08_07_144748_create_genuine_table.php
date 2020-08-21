<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGenuineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        {
            Schema::create('genuine', function (Blueprint $table) {
                $table->increments('id');
                $table->string('entryday');
                $table->string('name');
                $table->string('phonetic');
                $table->string('gender');
                $table->string('consort')->nullable();
                $table->string('parent')->nullable();
                $table->string('year');
                $table->string('month');
                $table->string('day');
                $table->string('age');
                $table->string('zip01');
                $table->string('pref01');
                $table->string('addr01');
                $table->string('line')->nullable();
                $table->string('station')->nullable();
                $table->string('tel')->nullable();
                $table->string('mobiletel')->nullable();
                $table->string('email')->nullable();
                $table->string('mobilemail')->nullable();
                $table->string('emergencytel');
                $table->string('joincompany');
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
