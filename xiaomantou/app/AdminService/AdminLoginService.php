<?php

namespace App\AdminService;
use App\model\AdminUsers; 
use Illuminate\Support\Facades\Crypt;

/**
 * 登录类
 */
class AdminLoginService
{ 
	/**
	 * 登录密码校验
	 * @param  [type] $data [数组用户明密码]
	 * @return [type]       [是否成功]
	 */
	public function login($data){
		$adminusers = AdminUsers::where('username', $data['username'])->get()->toArray();		
		if($adminusers){
			$adminusers =$adminusers[0];
			if($data['password'] == Crypt::decrypt($adminusers['password'])){
                session(['adminuser' => $adminusers]);
              	return  true;
            }
            return false;
		}
		return false;
	}
	
}
