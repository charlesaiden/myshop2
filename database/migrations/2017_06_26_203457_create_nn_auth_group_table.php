<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNnAuthGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    Schema::create('nn_auth_group',function(Blueprint $table)
    {
        $table->engine = 'InnoDB';
        $table->increments('id')->comment('主键');
        $table->string('title');
        $table->tinyInteger('status')->default(1)->comment('状态');
        $table->string('rules')->comment('规则id');
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
        Schema::drop('nn_auth_group');
    }
}
