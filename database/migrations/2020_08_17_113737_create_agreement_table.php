<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgreementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        {
            Schema::create('agreement', function (Blueprint $table) {
                $table->increments('id');
                $table->string('genuine_id');
                $table->string('contract')->nullable();
                $table->string('place')->nullable();
                $table->string('time')->nullable();
                $table->string('break')->nullable();
                $table->string('overtime')->nullable();
                $table->string('holiday')->nullable();
                $table->string('paid')->nullable();
                $table->string('other')->nullable();
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
