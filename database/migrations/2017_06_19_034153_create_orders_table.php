<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id')->comment('主键');
            $table->Integer('userid')->comment('用户ID');
            $table->string('expressid')->comment('快递单号');
            $table->string('ordernum')->comment('订单号');
            $table->string('linkman')->comment('联系人');
            $table->string('address')->comment('收货地址');
            $table->string('imgurl')->comment('商品图片路径');
            $table->char('code',6)->comment('邮编');
            $table->string('phone')->comment('手机');
            $table->string('goods')->comment('商品名称');
            $table->tinyInteger('status')->comment('订单状态');
            $table->double('total')->comment('总价');
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
        Schema::drop('orders');
    }
}
