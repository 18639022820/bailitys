<?php

namespace App\Http\Controllers\Home;
use Illuminate\Http\Request;
use App\Http\Controllers\AppController;
use App\Service\WalletService;

/**
 * 会员信息
 */
class UserInfoController extends AppController
{
	/*
	 *获取用户的menoy积分
	 */
	public function getuserpoint(Request $request){
		$userinfo = $request->userinfo;
		$WalletService  = new WalletService;
		$point = $WalletService ->getscorebyuid($userinfo['id']);
		$point  = objectToArray($point)
		return ;
	}
}
