<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        {
            Schema::create('clientWorks', function (Blueprint $table) {
                $table->increments('id');
<<<<<<< HEAD
                $table->string('client_id');
=======
                $table->integer('client_id');
                $table->string('name');
                $table->integer('price');
>>>>>>> 98430cad716dacbacd73d94c3413bbe7701387d8
                $table->string('start');
                $table->string('end');
                $table->string('name');
                $table->integer('price');
                $table->string('devstart');
                $table->string('devend');
                $table->string('genre');
                $table->string('add01');
                $table->string('add02');
                $table->string('add03');
                $table->string('remote');
                $table->string('tool');
                $table->string('job_content');
                $table->string('required_skill');
                $table->string('Welcome_skills');
                $table->string('note');
        
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
