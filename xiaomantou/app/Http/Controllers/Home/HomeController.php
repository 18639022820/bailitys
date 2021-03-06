<?php

namespace App\Http\Controllers\Home;
use App\model\Users;
use App\model\UserInfo;
use App\model\Config;
use App\model\BoodAllCholesterol;
use Illuminate\Http\Request;
use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Cache;
use App\Service\LoginService;
use App\model\ConfigApp;
use App\model\InviteCode;
use App\model\UserMoneyWallet;
class HomeController extends AppController
{

	/**
	 * 首頁
	 */
	public function index(Request $request){
      //return  2+1;
      //   Cache::add('keytyu1', 'value67ewjfdlsfh', 0.2);
      //   $key = Cache::get('keytyu1');
      //   var_dump($key);return;
      //   var_dump($request->all());
      //   $boood =  BoodAllCholesterol::find(1);
      //   $flight = new BoodAllCholesterol;
      //   $flight->range = '12~23';
      //   $flight->addtime = time();
      //   $flight->measurtime = time();
      //   $flight ->save();
  	  //   $uid= $request->session()->get("user");
  	  // 	 var_dump($boood);	
      return View('home');
	}

	 /**
	  * 登录
	  */
    public function login(Request $request){ 
      	if($input = Input::all()){
      	 	$user  =  Users::where('username', $input['username'])->first()->toArray();
      	 	if(empty($user)){                
            	 return response() -> json(Ajax('0','没有该用户',''));
           	}else{
       		  if($input['password'] == Crypt::decrypt($user['password'])){
                session(['user' => $user]);
                return  response() -> json(Ajax('1','有用户',''));
              }else{
                return  response() -> json(Ajax('0','密码错误',''));
              }
           	}
      	}
      	return response() -> json(Ajax('0','没有数据参数',''));
    }

    /**
     * 退出登录
     */
    public function logout(){
       session(['user' =>null]);
    }

    /**
     * 注册
     */
    public function regist(){
    	
    	$input=Input::all();
    	//去数据库查询有没有这条邀请码的信息
    	$id = InviteCode::where('code',$input['invitecode'])->get();
    	$aa = (json_decode(json_encode($id),true));
    	if(empty($aa)){
    		$code='';
    	}else{
    		$code = $aa[0]['userid'];
    	}
        if($input){
              $user  =  Users::where('username', $input['username'])->first();
              $usemor  =  Users::where('tele', $input['tele'])->first();
              if($user || $usemor){
                   $result['res'] = "fail";
              }else{
                  $users = new Users();
                  $users -> username = $input['username'];
                  $users -> password = Crypt::encrypt($input['password']);
                  $users -> tele = $input['tele'];
                  $users -> addtime = time();
                  $users -> inviteuser = $code;
                  if($users -> save()){
                  	$invite = new InviteCode();
                  	$invite -> code = $users -> id.time();
                  	$invite -> userid = $users->id;
                  	$invite -> save();
                  }
                  
                  $result['res'] = "success";
              }
        }
        echo json_encode($result,JSON_UNESCAPED_UNICODE);
    }
    

    /**
     * 保存用户信息
     */
    public function saveuseinfo(Request $request){
        $input=$request->all();
        $result = (new UserInfo()) -> add($input);
        if($result) return response()->json(Ajax('1','添加完成',''));
        return response()->json(Ajax('0','已经保存了请修改，或者服务错误，请联系管理员',''));
    }

    /**
     * 添加图片
     */
    public function saveuserlogo(Request $request){
        $imagebase64  =  $request->input('data');
        $data     =   $this->UploadfiletoBun($imagebase64,'userlogo');
        $dafile   =   ['name'=>$data['name'],'fullpath'=>$data['fullpath']];
        return  response() -> json(Ajax($data['staus'],'保存成功',$dafile));
    }

    /**
     * 发送短信
     */
    public function sendmesage(Request $request){
         $input=$request->input('tele');
         $loginservice = new LoginService();
         $resulet = $loginservice->send($input);
         if($resulet) return  response() -> json(Ajax(1,'发送成功',''));
         return  response() -> json(Ajax(0,'发送失败',''));
    }

    /**
     * 验证短信-登录
     */
    public function sendvritey(Request $request){
        $input=$request->input('str');
        $loginservice = new LoginService();
        $resulet = $loginservice->sendmsgvarty($input);
        if($resulet) 
          {
            $inputtele=$request->input('tele');
            $user  =  Users::where('tele', $inputtele)->get();
            if(!$user->isEmpty()){
              session(['user' => $user->toArray()[0]]);
              $data =['id'=>$user->toArray()[0]['id'],'username'=>$user->toArray()[0]['username'],
                      'tele' =>$user->toArray()[0]['tele'],'addtime' =>$user->toArray()[0]['addtime'],
                      'pwd' =>Crypt::decrypt($user->toArray()[0]['password']),
                      'password' =>$user->toArray()[0]['password']];
       
             return  response() -> json(Ajax(1,'登录成功',$data));
            }
              return  response() -> json(Ajax(2,'没有该用户','')); 
          }
        return  response() -> json(Ajax(0,'验证失败',''));
    }

    /**
     * 短信登录
     */
    public function verification(Request $request){
         $input=$request->input('str');
         $loginservice = new LoginService();
         $resulet = $loginservice->sendmsgvarty($input);
         if($resulet) 
         {
          return  response() -> json(Ajax(1,'验证成功','')); 
         }
         return response() -> json(Ajax(0,'验证失败',''));
    }

    /**
     * 生成用户名，密码
     */
    public function loginseed(Request $request){
        //return $request->input('tele');
        $teleinput = $request->input('tele');
        $user  =  Users::where('tele', $teleinput)->get();
        if($user->isEmpty()){
          return  response() -> json(Ajax(0,'该手机号码已存在',$result));
        }
        $loginservice = new LoginService();
        $result = $loginservice ->seeduser($teleinput);
        return  response() -> json(Ajax(1,'生成用户名密码',$result));
    }

    /**
     * 获取用户信息
     */
    public function userinfo(){
       $user  =    session('user');
       $useringo = UserInfo::where('userid',$user['id'])->get();
        if(!$useringo->isEmpty()){
           return  response() -> json(Ajax(1,'用户信息',$useringo->toArray()[0]));
        }
        return  response() -> json(Ajax(2,'还没用户信息',''));
    }
    /******** 
    *函数功能描述 ： 生成邀请码
    ************************/
    public function invite(){
    	$invite = InviteCode::where('userid',session('user')['id'])->get(['code']);
    	echo json_encode($invite);
    }
    /******** 
    *函数功能描述 ： 当前用户的资产
    ************************/
    public function money(){
    	$money = UserMoneyWallet::where('userid',session('user')['id'])->get(['money','bonus']);
    	echo json_encode($money);
    }
    /**
     * 轮播图
     */
    public function lunbopic(){
        $appcong = (new ConfigApp()) -> getconfig('lunbotu');
        return  response() -> json(Ajax(1,'lunbotuxinxi',$appcong));
    }

    /**
     * test
     */
    public function test(){
    
         return  \App\ToolS\Time::zorotimespan();
      // $rest = (new Config())->getconfig('message');
      // return $rest;
      // $count = strlen('620422199012180536');
      // var_dump('620422199012180536');
      //return  ['sta'=>$count];
    }
}
