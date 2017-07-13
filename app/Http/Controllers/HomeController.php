<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use DB;
class homeController extends BaseController
{
    public function index()
    {

        
    	$name = '黎志强';
    	$data = array(
            
    		// array(
    		// 	'id'=>1,
    		// 	'name'=>'张三',
    		// 	'age'=>13
    		// ),

    		// array(
    		// 	'id'=>2,
    		// 	'name'=>'李四',
    		// 	'age'=>13
    		// ),

    		// array(
    		// 	'id'=>3,
    		// 	'name'=>'王五',
    		// 	'age'=>13
    		// )

    	);
    	//echo "home.index";
    	// return view('home.index',['data'=>$data]);
    	// return view('home.index')->with('data',$data);

    	return view('home.index',compact('data','name'));
    }

    public function login()
    {
    	return view('home/login');
    }
}


