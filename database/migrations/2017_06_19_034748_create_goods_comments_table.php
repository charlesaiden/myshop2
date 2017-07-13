<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_comments', function (Blueprint $table) {
            $table->increments('id')->comment('主键');
            $table->Integer('orderid')->comment('订单ID');
            $table->Integer('goodsid')->comment('商品ID');
            $table->Integer('userid')->comment('用户ID');
            $table->Integer('content')->comment('评论');
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
        Schema::drop('goods_comments');
    }
}
