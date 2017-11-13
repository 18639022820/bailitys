<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\AdminController;
use App\AdminService\AdminToolService;
use Illuminate\Http\Request;
use App\model\ConfigApp;
use App\Service\WalletService;
use App\model\AdminUsers;
use Illuminate\Support\Facades\Crypt;
use App\model\UserMoneyWallet;
use App\model\Users;
/**
 * 小工具，轮播图等
 */
class AdminToolController extends AdminController
{

	/******** 
	*函数功能描述 ： 注册管理员
	************************/
	public function addadmin(Request $request){
         $admin = new AdminUsers();
         $admin -> username = $request -> username;
         $admin -> password = Crypt::encrypt($request -> password);
         $admin -> type = $request -> type;
         $admin -> addtime = time();
         if($admin -> save()){
         	return '添加管理员成功';
         }else{
         	return '注册失败';
         }
	}
 	/**
 	 * 后台首页
 	 */
 	public function index(){
 		return view('admin/index');
 	}
 	/**
 	 * 前台轮播图控制
 	 * @return [type] [description]
 	 */
 	public function lunboto(){
 		$lunbolist = (new AdminToolService())->getlunbo();
 		return view('admin/tool/lunboto',['lunbolist'=>$lunbolist]);
 	}

 	/**
 	 * 编辑轮播图
 	 * @param  [type] $id [description]
 	 * @return [type]     [description]
 	 */
 	public function editlunboto(Request $request){
 		$findlunbo = (new AdminToolService())->findlunbo($request->id);
 		return view('admin/tool/editorlunbotoone',['findlunbo'=>$findlunbo]);
 	}

 	/**
 	 * 上传轮播图
 	 * @return [json] [轮播图地址]
 	 */
 	public function upimg(Request $request){
 		$imagebase64 = $request->input('data');
		$data = $this->UploadfiletoBun($imagebase64,'lunbotu');
		$dafile= ['name'=>$data['name'],'fullpath'=>$data['fullpath']];
		return response() -> json(Ajax($data['staus'],'保存成功',$dafile));
 	}

 	/**
 	 * 轮播图保存
 	 */
 	public function lunbotusane(Request $request){
 		$request = $request->all();
		$configapp=ConfigApp::find($request["id"]);
		$configapp->value=$request["value"];
		$configapp->discri = $request["discri"];
		$configapp->save();
		return 1;
 	}
 	
 	
 	/**
 	 * 管理钱包
 	 */
 	public function wallet(){
 		$wallerservice = new WalletService();
 		$list = $wallerservice -> listtowall();
 		// /var_dump($list);
 		return view('admin/tool/wallet',['list'=>$list]);
 	}

 	/**
 	 * 获取单个人的钱包
 	 */
 	public function perwalletadmin(Request $request){
 		$uid 	= 	$request->uid;
 		$wallerservice 		=	 new WalletService();
 		$userinfo 	=	 $wallerservice -> getscorebyuid($uid);
 		return view('admin/tool/perwalletadmin',['userinfo'=>$userinfo]);
 	}

 	/**
 	 * 后台调整个人钱包
 	 */
 	public function savepersonwallbyadmin(Request $request){
 		$persionwall = $request->all();
 		$money = new UserMoneyWallet();
 		$wallerservice 		=	 new WalletService();
 		//根据传过来的id查询个人钱包表里有没有此用户信息，也就是是否第一次充值
 		$per = $money::where('userid',$request->uid)->get();
 		if(!$per->isEmpty()){//不是第一次充值，就直接修改money
 			$res = $wallerservice -> updatemoney($persionwall);
 		}else{//是第一次充值，往表里添加用户信息
 			$re = $wallerservice -> savewaletbyadmin($persionwall);
 		}
 		//当用户充值成功之后查询他是否被推荐过来的，如果是推荐过来的，就对推荐人进行返利充值
 		$users = new Users();
 		$user = $users::where('id',$request->uid)->get();
 		$info = (json_decode(json_encode($user),true));
 		if($info){
 			//如果是有人推荐，就查找此推荐人是否有过充值，循环上述过程
	 		$a = $money::where('userid',$info[0]['inviteuser'])->get();
	 		if(!$a->isEmpty()){//不是第一次充值，就直接修改奖金
	 			$money::where('userid',$info[0]['inviteuser'])->increment('bonus',$request->money*0.08);
	 			return response()->json(Ajax('1','充值成功',''));
	 		}else{//是第一次充值，往表里添加用户信息
	 			$money->bonus = $request->money*0.08;
	 			$money->userid = $info[0]['inviteuser'];
	 			$money->addtime = time();
	 			$money->save();
	 			return response()->json(Ajax('1','充值成功',''));
	 		}
 		}
 		
/*  		$persionwll 		=	 $wallerservice -> savewaletbyadmin($persionwall);
 		switch ($persionwll) {
 			case 1:
 			case 2:	
 			case 3:
 			case 4:
 			 return redirect('admin/tool/wallet');	
 				
 			default:
 				
 				break;
 		}
 */
 	}
 	/*** 
 	*功能描述 ：后台查看用户邀请了多少人注册 
 	***/
 	public function look(Request $request){
 		
 		$look = Users::where('inviteuser',$request->uid)->get(['username','tele','addtime']);
 		if($look -> isEmpty()){
 			echo 1;
 		}else{
 			echo json_encode($look,JSON_UNESCAPED_UNICODE);
 		}  
 		
 	}

}
