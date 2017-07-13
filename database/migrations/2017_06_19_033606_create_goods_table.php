<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('goods', function (Blueprint $table) {
            $table->increments('goods_id')->comment('主键');
            $table->tinyInteger('typeid')->comment('分类ID');
            $table->tinyInteger('goods_sn')->nullable()->comment('商品货号');
            $table->string('goods_name')->comment('商品名称');
            $table->decimal('weight',8,2)->nullable()->comment('重量(g)');
            $table->decimal('mareket_price',8,2)->nullable()->comment('市场价格');
            $table->decimal('shop_price',8,2)->nullable()->comment('商城价格');
            $table->decimal('cost_price',8,2)->nullable()->comment('成本价格');
            $table->string('goods_remake')->nullable()->comment('简单描述');
            $table->text('goods_content')->nullable()->comment('描述内容');
            $table->text('original_img')->nullable()->comment('原始图片');
            $table->string('cover_img')->nullable()->comment('封面图');
            $table->tinyInteger('is_on_sale')->default(1)->comment('是否上架');
            $table->tinyInteger('sort')->default(0)->comment('排序');
            $table->tinyInteger('is_recommend')->default(1)->comment('是否推荐');
            $table->tinyInteger('is_new')->default(1)->comment('新品');
            $table->tinyInteger('is_hot')->default(1)->comment('热卖');
            $table->Integer('store_count')->default(0)->comment('库存');
            $table->Integer('sales_num')->default(0)->comment('商品销量');
            $table->Integer('click_num')->default(0)->comment('点击量');
            $table->tinyInteger('prom_type')->comment('0 普通订单,1 限时抢购, 2 团购 , 3 促销优惠,4预售');
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
        Schema::drop('goods');
    }
}
