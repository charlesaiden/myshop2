<?php

use Illuminate\Database\Seeder;

class cars extends Seeder
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
        	$tmp['userid'] = rand(0,20);
        	$tmp['goodsid'] = rand(0,20);
        	$tmp['num'] = rand(0,20);
        	$tmp['created_at'] = date('Y-m-d H:i:s');
        	$tmp['updated_at'] = date('Y-m-d H:i:s');
        	$arr[] = $tmp;
        }
        DB::table('cars')->insert($arr);
    }
}
