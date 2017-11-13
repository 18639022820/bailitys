<?php

namespace App\ToolS;


class Message
{ 
	public function send($data){
		$randm=$data['randm'];
		 $array=['uid'=>$data['appkey'],'auth'=>MD5($data['secretKey']),
				 'mobile'=>$data['tele'],
				 'msg'=>urlencode("您的验证码是：$randm"),
				 'expid'=>0, 'encode'=>'utf-8'];
		return $this ->request_post('http://sms.10690221.com:9011/hy/',$array);
	}


	protected function request_post($url,$post_data){
		if (empty($url) || empty($post_data)) {
				return false;
		}				
		$o = "";
		foreach ( $post_data as $k => $v ) 
		{ 
			$o.= "$k=" . urlencode( $v ). "&" ;
		}
		$post_data = substr($o,0,-1);
		
		$postUrl = $url;
		$curlPost = $post_data;
		$ch = curl_init();//初始化curl
		curl_setopt($ch, CURLOPT_URL,$postUrl);//抓取指定网页
		curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
		curl_setopt($ch, CURLOPT_POST, 1);//post提交方式
		curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
		$data = curl_exec($ch);//运行curl
		curl_close($ch);	
		return $data;			
	}  	
}
