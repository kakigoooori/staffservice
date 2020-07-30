<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        {
            Schema::create('users', function (Blueprint $table) {
                $table->increments('id');
                $table->string('area');
                $table->string('number');
                $table->string('password');
                $table->string('nickname');
                $table->string('authority');
                $table->string('team');
                $table->string('post');
                $table->string('email');
                $table->integer('tel');
                $table->string('note')->nullable();
                $table->string('image')->nullable();
                $table->string('remember_token')->nullable();
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
