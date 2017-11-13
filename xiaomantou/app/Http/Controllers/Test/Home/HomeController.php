<?php

namespace App\Http\Controllers\Test\Home;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;

class HomeController extends AdminController
{
	/**
	 * test测试
	 */
	public function  index(){
		var_dump("新发现");
	}
}


