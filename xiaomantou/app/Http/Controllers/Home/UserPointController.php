<?php

namespace App\Http\Controllers\Home;
use App\Service\UserpointService;
use Illuminate\Http\Request;
use App\Http\Controllers\AppController;

/**
 * 会员积分登
 */
class UserPointController extends AppController
{
	/**
	 * 签到
	 */
	public function singinpoint(){
		$userpointservice = new UserpointService();
		$ser = $userpointservice -> pointdate();
		if($ser)return response() -> json(Ajax('1','签到成功',''));
		return response() -> json(Ajax('0','您已签到过',''));
	}

	/**
	 * 积分抽奖
	 */
	public function pointprize(){
		$userpointservice = new UserpointService();
		$ser = $userpointservice -> getRandmNo();
		if($ser){
	 		if($ser==2){
	 			return 	 response() -> json(Ajax(2,"该次抽奖不算，请继续抽奖",$ser));
	 		}else{
	 			return 	 response() -> json(Ajax(1,"抽奖结果",$ser));
	 		}
	 	}
	 	if(!$ser){
	 		return 	 response() -> json(Ajax(3,"积分不够了",""));
	 	}
	}
}
