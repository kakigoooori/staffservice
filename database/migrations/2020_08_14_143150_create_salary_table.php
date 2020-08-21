<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        {
            Schema::create('salary', function (Blueprint $table) {
                $table->increments('id');
                $table->string('genuine_id');
                $table->string('basic')->nullable();
                $table->string('allowance')->nullable();
                $table->string('insurance')->nullable();
                $table->string('mynumber')->nullable();
                $table->string('bankname')->nullable();
                $table->string('storename')->nullable();
                $table->string('account_number')->nullable();
                $table->string('account_name')->nullable();
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
