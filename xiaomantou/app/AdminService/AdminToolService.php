<?php

namespace App\AdminService;
use App\model\ConfigApp; 
use Illuminate\Support\Facades\Crypt;
/**
 * 登录类
 */
class AdminToolService
{ 
	/**
	 * 后台轮播图
	 * @return [type] [description]
	 */
	public function getlunbo(){
		$lunlist = ConfigApp::where('name','lunbotu')->get()->toArray();
		foreach ($lunlist as $key => &$value) {
			$value['value'] = attach('lunbotu',$value['value']);
		}
		return $lunlist;
	}

	/**
	 * 获取单个轮播图信息
	 */
	public function findlunbo($id){
		$configappfindone = ConfigApp::find($id);
		$configappfindone->valueforimg= attach('lunbotu',$configappfindone->value);
		return $configappfindone;
	}
	
}
