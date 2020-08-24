<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        {
            Schema::create('skill', function (Blueprint $table) {
                $table->increments('id');
                $table->string('genulne_id');
                $table->string('nickname');
                $table->string('performance1')->nullable();
                $table->string('performance2')->nullable();
                $table->string('performance3')->nullable();
                $table->string('performance4')->nullable();
                $table->string('performance5')->nullable();
                $table->string('rank')->nullable();
                $table->string('score')->nullable();
                $table->string('pc')->nullable();
                $table->string('manners')->nullable();
                $table->string('sensible')->nullable();
                $table->string('certification1')->nullable();
                $table->string('learn1')->nullable();
                $table->string('certification2')->nullable();
                $table->string('learn2')->nullable();
                $table->string('certification3')->nullable();
                $table->string('learn3')->nullable();
                $table->string('certification4')->nullable();
                $table->string('learn4')->nullable();
                $table->string('certification5')->nullable();
                $table->string('learn5')->nullable();
                $table->string('skill1')->nullable();
                $table->string('skill2')->nullable();
                $table->string('skill3')->nullable();
                $table->string('mobilemail')->nullable();
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
