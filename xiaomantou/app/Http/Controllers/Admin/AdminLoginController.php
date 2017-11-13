<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\AdminService\AdminLoginService;
/**
 * 后台登录
 */
class AdminLoginController extends AdminController
{

	/**
	 * 登录界面
	 */
	public function login(Request $request){
		if($request->all()){
			$adminlogin = (new AdminLoginService())->login($request->all());
			if($adminlogin){
				return view('admin/index');
			}
		}
		return view('admin/login/login');
	}
}
