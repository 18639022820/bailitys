<?php

namespace App\Service;
use App\model\ArticleTitle;
use App\model\UserInfo;
class UserInfoService
{ 
	/**
	 * 用户信息
	 */
	static public function userattachlogo($id){
		 $tologo =  UserInfo::find($id);
		 if(!empty($tologo)){
            $restlr = attach('userlogo',$tologo->logo); 
         }else{
            $restlr = 1; 
         }
         return  $restlr;
	}

	/**
	 * 获取用户的余额
	 */
	public function getuserpoint(){
		
	}

}
