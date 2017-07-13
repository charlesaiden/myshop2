<?php

use Illuminate\Database\Seeder;

class goods_comments extends Seeder
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
        for($i=0; $i<10;$i++){
        	$tmp=[];
        	$tmp['orderid'] = rand(0,20);
        	$tmp['userid'] = rand(0,20);
        	$tmp['goodsid'] = rand(0,100);
        	$tmp['content'] = str_random(11);
        	$tmp['created_at'] = date('Y-m-d H:i:s');
        	$tmp['updated_at'] = date('Y-m-d H:i:s');
        	$arr[] = $tmp;
        }
        DB::table('goods_comments')->insert($arr);
    }
}
