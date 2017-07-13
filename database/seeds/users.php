<?php

use Illuminate\Database\Seeder;

class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr=[];
        for($i=0; $i<10;$i++){
        	$tmp=[];
        	$tmp['username'] = str_random(20);
        	$tmp['pass'] = str_random(20);
        	$tmp['sex'] = rand(0,1);
        	$tmp['address'] = str_random(20);
        	$tmp['code'] = str_random(6);
        	$tmp['phone'] = str_random(11);
        	$tmp['email'] = str_random(20).'@163.com';
        	$tmp['state'] = rand(0,20);
        	$tmp['level'] = rand(0,4);
        	$tmp['created_at'] = date('Y-m-d H:i:s');
        	$tmp['updated_at'] = date('Y-m-d H:i:s');
        	$arr[] = $tmp;
        }
        DB::table('users')->insert($arr);
    }
}
