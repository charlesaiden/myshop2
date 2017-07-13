<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique()->comment('用户名');
            $table->string('pass')->nullable()->comment('密码');
            $table->string('pname')->nullable()->comment('昵称');
            $table->string('name')->nullable()->comment('真实姓名');
            $table->tinyInteger('sex')->nullable()->comment('性别:男1女0');
            $table->string('address')->nullable()->comment('地址');
            $table->string('code')->default('000000')->comment('邮编');
            $table->string('phone')->comment('手机');
            $table->string('pic')->default('public/images/upic
')->comment('头像');
            $table->string('email')->nullable()->comment('邮箱');
            $table->tinyInteger('state')->default(1)->comment('状态');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('members');
    }
}
