<?php

use Illuminate\Database\Seeder;

class addresses extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $arr =[];
		for($i=0;$i<40;$i++){
			$tmp = [];
			$tmp['userid'] = rand(1,10);
			$tmp['consignee'] = str_random(20);
			$tmp['phone'] = rand(1,10);
			$tmp['province'] = str_random(10);
			$tmp['city'] = str_random(5);
			$tmp['county'] = str_random(5);
			$tmp['detailed_address'] = str_random(20);
			$tmp['status'] = rand(1,3);
			$tmp['created_at'] = date('Y-m-d H:i:s');
        	$tmp['updated_at'] = date('Y-m-d H:i:s');
			$arr[] = $tmp;
			}
			DB::table('addresses')->insert($arr);

    }
}
