<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHopeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        {
            Schema::create('hope', function (Blueprint $table) {
                $table->increments('id');
                $table->string('genuine_id');
                $table->string('job')->nullable();
                $table->string('place')->nullable();
                $table->string('industry')->nullable();
                $table->string('annual_income')->nullable();
                $table->string('startday')->nullable();
                $table->string('priority1')->nullable();
                $table->string('priority2')->nullable();
                $table->string('priority3')->nullable();
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
