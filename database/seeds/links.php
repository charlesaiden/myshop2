<?php

use Illuminate\Database\Seeder;

class links extends Seeder
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
        	$tmp['name'] = str_random(20);
        	$tmp['url'] = 'www.'.str_random(3).".com";
        	$tmp['picname'] = str_random(3).".pic";
        	$tmp['created_at'] = date('Y-m-d H:i:s');
        	$tmp['updated_at'] = date('Y-m-d H:i:s');
        	$arr[] = $tmp;
        }
        DB::table('links')->insert($arr);
    }
}
