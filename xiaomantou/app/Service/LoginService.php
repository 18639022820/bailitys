<?php
namespace App\Service;
use App\model\Config;
use App\ToolS\Message;
use App\model\Users;
use App\ToolS\Strgs;
use Illuminate\Support\Facades\Crypt;
class LoginService
{ 	
  
	/**
	 * 发送短信
	 */
   	public function send($tele){
   		$configsool =  (new Config())->getconfig('message');
   		$randm=mt_rand(100000, 999999);
   		session(['sendmesage'=>['randm'=>MD5($randm),'time'=>time()]]);
   		$message =  new Message();
   		$data=['appkey'=>$configsool['appkey'],'secretKey'=>$configsool['secretKey'],
   				'tele' =>$tele,'randm' =>$randm];
  		$result = $message ->send($data);
  		$ary = explode(',',  $result);
  		if($ary[0]==0 && !empty($ary[1])){
  			return 1;	
  		}
		  return 0;
   	}

   	/**
   	 * 短信验证
   	 */
   	public function sendmsgvarty($nomber='artiec'){
   		$sendmesage = session('sendmesage');
   		if($sendmesage['randm']==MD5($nomber)){
   			//session(['sendmesage'=>null]);
   			return 1;
   		}
   		return 0;
   	}

      /**
       * 生成用户名密码
       */
    public function seeduser($tel){
        $password = Strgs::randomstr(3);  
        $users = new Users();
        $users ->username = Strgs::randomstr(4);
        $users ->password = Crypt::encrypt($password);
        $users ->tele = $tel;
        $users ->addtime = time();
        if($users ->save()){
            $users ->pwd =$password;
            return  $users;
        }
        return  0;    
    }
}
