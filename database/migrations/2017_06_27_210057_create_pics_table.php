<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('pics',function(Blueprint $table)
         {
        $table->engine = 'InnoDB';
        $table->increments('id')->comment('图片id');
        $table->string('url')->comment('图片路径');
        $table->string('name')->comment('图片名');
        $table->timestamps();
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
        Schema::drop('pics');
    }
}
