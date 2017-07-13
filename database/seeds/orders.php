<?php

use Illuminate\Database\Seeder;

class orders extends Seeder
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
        for($i=0; $i<10; $i++){
        	$tmp=[];
        	$tmp['userid'] = rand(0,100);
        	$tmp['ordernum'] = rand(0,100);
        	$tmp['linkman'] = str_random(5);
        	$tmp['address'] = str_random(10);
        	$tmp['code'] = rand(0,100);
        	$tmp['phone'] = rand(999,10000);
        	$tmp['goods'] = str_random(5);
        	$tmp['total'] = rand(0,100);
        	$tmp['status'] = rand(0,3);
        	$tmp['created_at'] = date('Y-m-d H:i:s');
        	$tmp['updated_at'] = date('Y-m-d H:i:s');
    		$arr[] = $tmp;
        }
        DB::table('orders')->insert($arr);
    }
}
