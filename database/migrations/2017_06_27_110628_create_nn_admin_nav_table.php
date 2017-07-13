<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNnAdminNavTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('nn_admin_nav',function(Blueprint $table)
         {
        $table->engine = 'InnoDB';
        $table->increments('id')->comment('菜单表');
        $table->tinyInteger('pid')->default(0)->comment('所属菜单');
        $table->string('name')->comment('菜单名称');
        $table->string('mca')->comment('模块、控制器、方法');
        $table->string('ico')->comment('font-awesome图标');
        $table->tinyInteger('order_number')->comment('排序');
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
        Schema::drop('nn_admin_nav');
        
    }
}
