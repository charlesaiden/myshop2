<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNnAuthRuleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('nn_auth_rule',function(Blueprint $table)
        {
        $table->engine = 'InnoDB';
        $table->increments('id')->comment('主键');
        $table->string('name')->unique()->comment('规则唯一标识');
        $table->string('title')->comment('规则中文名称');
        $table->tinyInteger('status')->default(1)->comment('状态：为1正常，为0禁用');
        $table->string('type');   
        $table->string('condition')->comment('规则表达式，为空表示存在就验证，不为空表示按照条件验证');   

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
        Schema::drop('nn_auth_rule');
    }
}
