<?php

namespace App\Http\Controllers;
use App\ToolS\SaveUploadfile;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

/**
 * 所有控制器的爸爸
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(){
    	if (method_exists ($this,'_loadApp')) {
		   $this->_loadApp();
		}
    }


    protected function UploadfiletoBun($data,$dirname){
        if(!$data)return ['staus'=> 0 ,'fullpath'=>null,'name'=>null];
    	$data= ['imgbase'=>$data,'dirname' =>$dirname,'type'=>1];
    	$result = (new SaveUploadfile())-> savefile($data);
    	return $result;
    }
}
