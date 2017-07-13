<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNnUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('nn_user',function(Blueprint $table)
         {
        $table->engine = 'InnoDB';
        $table->increments('id')->comment('主键');
        $table->string('name');
        $table->string('password');
        $table->tinyInteger('age');
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
        Schema::drop('nn_user');
    }
    
}
