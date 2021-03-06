<?php

namespace App\Service;
use App\model\UserMoneyWallet;
use Illuminate\Support\Facades\DB;
use App\model\Users; 

/**
 * 钱包服务
 */
class WalletService
{ 
	/**
	 * 获取用户的积分列表
	 */
	public function listtowall(){
		$list = DB::table('users')
				->leftJoin('user_money_wallet', 'users.id', '=', 'user_money_wallet.userid')
	            ->select('users.*','user_money_wallet.id as walid ','user_money_wallet.money','user_money_wallet.bonus as bonus','user_money_wallet.addtime as time')
	            ->paginate(15);
	            //p($list);
	    return $list;
	}

	/**
	 * 获取到单个的用户积分
	 */
	public function getscorebyuid($uid){
		$info = DB::table('users')->leftJoin('user_money_wallet', 'users.id', '=', 'user_money_wallet.userid')
					->where('users.id','=',$uid)
		 		 	->select('users.*','user_money_wallet.id as walid ','user_money_wallet.money','user_money_wallet.userinfo as wauserinfo','user_money_wallet.addtime as time')
		 		 	->get();
		 		 $info[0]->time =date('Y-m-d H:i:s',$info[0]->time);
		return $info[0];
	}

	/**
	 * 资产表添加个人资产信息
	 */
	public function savewaletbyadmin($post){
		$usermog = UserMoneyWallet::where('userid','=',$post['uid'])->get();
		if($usermog->isempty()){
			$data['userid']=$post['uid'];
			$data['money']=$post['money'];
			$data['mark']='';
			$data['userinfo']='';
			$data['adminscore']='';
		 	$id = (new UserMoneyWallet())->add($data);
			if($id){
				return 1;
			}
			return 2;
		}
		
	}
	/******** 
	*函数功能描述 ： 修改个人资产
	************************/
	public function updatemoney($post){
		$result = UserMoneyWallet::where('userid', $post['uid'])
		 ->increment('money',$post['money']);
		 if($result){
		 return 3;
		 }else{
		 return 4;
		 } 
	}
	
}
