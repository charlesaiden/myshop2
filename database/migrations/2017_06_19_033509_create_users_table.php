<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->comment('主键');
            $table->string('username')->comment('账号');
            $table->string('pass')->comment('密码');
            $table->tinyInteger('sex')->comment('性别');
            $table->string('address')->comment('地址');
            $table->char('code',6)->comment('邮编');
            $table->char('phone',11)->comment('电话');
            $table->string('email')->comment('邮箱');
            $table->tinyInteger('state')->comment('状态');
            $table->tinyInteger('level')->comment('等级');
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
        Schema::drop('users');
    }
}
