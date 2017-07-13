<?php

use Illuminate\Database\Seeder;

class products extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $arr = [];
        for($i=0; $i<20;$i++){
        	$tmp = [];
        	$tmp['typeid'] = rand(1,10);
        	$tmp['goods'] = str_random(20);
        	$tmp['company'] = str_random(20);
        	$tmp['descr'] = str_random(30);
        	$tmp['price'] = rand(1,9999999);
        	$tmp['picname'] = str_random(40);
        	$tmp['picname_m']= str_random(40);
        	$tmp['picname_s']= str_random(40);
        	$tmp['state'] = rand(0,3);
        	$tmp['store'] = rand(0,9999999);
        	$tmp['num'] = rand(0,9999999);
        	$tmp['clicknum'] = rand(0,9999999);
        	$tmp['created_at'] = date('Y-m-d H:i:s');
        	$tmp['updated_at'] = date('Y-m-d H:i:s');
        	$arr[] = $tmp;
        }
        //插入
        DB::table('products')->insert($arr);
    }
}
