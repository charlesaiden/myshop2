<?php

use Illuminate\Database\Seeder;

class goods extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $arr=[];
        for($i=0; $i<20;$i++){
        	$tmp=[];
        	$tmp['typeid'] = rand(1,20);
        	$tmp['goods_sn'] = 'sn_'.rand(1,1000);
        	$tmp['goods_name'] = str_random(8);
        	$tmp['weight'] = rand(0,1000);
        	$tmp['mareket_price'] = rand(0,1000);
        	$tmp['shop_price'] = rand(0,1000);
        	$tmp['cost_price'] = rand(0,1000);
        	$tmp['goods_remake'] = rand(0,1000);
        	$tmp['goods_content'] = str_random(8);
        	$tmp['original_img'] = str_random(20);
            $tmp['cover_img'] = '../../style/images/image.png';
        	$tmp['is_on_sale'] = rand(0,1);
			$tmp['sort'] = rand(0,100);
            $tmp['is_recommend'] = rand(0,1);
            $tmp['is_new'] = rand(0,1);
            $tmp['is_hot'] = rand(0,1);
            $tmp['store_count'] = rand(0,1000);
            $tmp['sales_num'] = rand(0,1000);
            $tmp['click_num'] = rand(0,100);
            $tmp['prom_type'] = rand(0,100);
        	$tmp['created_at'] = date('Y-m-d H:i:s');
        	$tmp['updated_at'] = date('Y-m-d H:i:s');
        	$arr[] = $tmp;
        }
        DB::table('goods')->insert($arr);
    }
}
