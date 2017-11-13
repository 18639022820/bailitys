<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppController extends Controller
{

	protected $userinfo=null;

	public function _loadApp(){
		//$user = session('user');
		//var_dump($user);
		//var_dump(23);
		// if(session('user')){
		// 	$this->userinfo=session('user');
		// 	var_dump($this->userinfo);
		// }
	}

	public function sendmeage(){
		
	}
 
}
