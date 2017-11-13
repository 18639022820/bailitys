<?php

namespace App\Http\Controllers\Home;
use App\model\Users;
use App\model\BoodAllCholesterol;
use Illuminate\Http\Request;
use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;


class ToolController extends AppController
{

	/**
	 * csrftoke
	 */
  public function __gettoken(){
    echo csrft();
    echo "string";
  }

 

}
