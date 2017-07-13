<?php

use Illuminate\Database\Seeder;

class members extends Seeder
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
        	$tmp['username'] = str_random(10);
        	$tmp['pass'] = str_random(10);
        	$tmp['pname'] = str_random(6);
        	$tmp['name'] = str_random(8);
        	$tmp['sex'] = rand(0,1);
        	$tmp['address'] = str_random(32);
        	$tmp['code'] = str_random(6);
        	$tmp['phone'] = str_random(11);
        	$tmp['pic'] = str_random(16);
        	$tmp['email'] = str_random(6).'@sina.com';
        	$tmp['state'] = rand(0,3);
        	$tmp['created_at'] = date('Y-m-d H:i:s');
        	$tmp['updated_at'] = date('Y-m-d H:i:s');
    		$arr[] = $tmp;
        }
        DB::table('members')->insert($arr);
    }
}
