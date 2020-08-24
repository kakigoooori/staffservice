<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamilyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        {
            Schema::create('family', function (Blueprint $table) {
                $table->increments('id');
                $table->string('genuine_id');
                $table->string('consort')->nullable();
                $table->string('parent')->nullable();
                $table->string('children')->nullable();
                $table->string('children2')->nullable();
                $table->string('children3')->nullable();
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
