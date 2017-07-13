<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id')->comment('主键');
            $table->Integer('userid')->comment('用户ID');
            $table->string('consignee')->comment('收货人');
            $table->string('phone')->comment('手机');
            $table->string('province')->comment('省份');
            $table->string('city')->comment('城市');
            $table->string('county')->comment('县/区');
            $table->string('detailed_address')->comment('详细地址');
            $table->tinyInteger('status')->comment('状态');
            $table->string('code')->comment('邮编');
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
        Schema::drop('addresses');
    }
}
