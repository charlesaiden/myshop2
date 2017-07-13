<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNnAuthGroupAccessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('nn_auth_group_access',function(Blueprint $table)
         {
        $table->engine = 'InnoDB';
        $table->increments('id')->comment('主键');
        $table->tinyInteger('uid')->comment('用户ID');
        $table->tinyInteger('group_id')->comment('用户组id');
        $table->unique(['uid','group_id'], 'uid_group_id');
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
        Schema::drop('nn_auth_group_access');

    }
}
