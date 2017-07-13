<?php

namespace App\Http\Controllers;


use Illuminate\Routing\Controller as BaseController;


class ProController extends BaseController
{
    public function index()
    {
    	// echo "pro_index##";
    	return view('pro.index');
    }
}


