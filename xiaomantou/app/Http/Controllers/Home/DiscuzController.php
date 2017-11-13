<?php

namespace App\Http\Controllers\Home;

use App\Service\DiscuzService;
use Illuminate\Http\Request;
use App\Http\Controllers\AppController;

/**
 * 社区论坛
 */
class DiscuzController extends AppController
{
	/**
	 * 保存主题
	 */
	public function savetop(Request $request){
		$result = (new DiscuzService()) -> addtop($request->all());
		if($result)return response() -> json(Ajax('1','保存成功',''));
		return response() -> json(Ajax('0','保存失败',''));
	}

	/**
	 * 回复帖子
	 */
	public function savereplytop(Request $request){
		$result = (new DiscuzService()) -> addreplay($request->all());
		if($result)return response() -> json(Ajax('1','保存成功',''));
		return response() -> json(Ajax('0','保存失败',''));
	}

	/**
	 * 回复回复
	 */
	public function saveaddrerelay(Request $request){
		$result = (new DiscuzService()) -> addrerelay($request->all());
		if($result)return response() -> json(Ajax('1','保存成功',''));
		return response() -> json(Ajax('0','保存失败',''));
	}

	/**
	 * 图片保存
	 */
	public function savepic(Request $request){
		$imagebase64 = $request->input('data');
		$data = $this->UploadfiletoBun($imagebase64,'discuz');
		$dafile= ['name'=>$data['name'],'fullpath'=>$data['fullpath']];
		return response() -> json(Ajax($data['staus'],'保存成功',$dafile));
	}

	/**
	 * 社区一级拉取
	 */
	public function distoplist(Request $request){
		$result = (new DiscuzService()) -> dislistrun();
		return response() -> json(Ajax('1','数据集合',$result));
	}

	/**
	 * 获取帖子详情
	 */
	public function distopdetail(Request $request){
		$id = $request ->get('id');
		$result = (new DiscuzService()) ->disdtal($id);
		return response() -> json(Ajax('1','数据集合',$result));
	}

	/**
	 * 点赞
	 */
	public function famous(Request $request){
		$id = $request ->get('id');
		$result = (new DiscuzService()) ->famous($id);
		if($result){
			return response() -> json(Ajax('1','点赞成功',''));
		}
		return response() -> json(Ajax('0','取消点赞',''));
	}

	/**
	 * 社区动态--我发布的帖子
	 */
	public function mytoplist(){
		$mytoplist =  (new DiscuzService())->dislistrun(['userid' => session('user')['id'],'mytop'=>'']);
		return response() -> json(Ajax('1','数据集合',$mytoplist));
	}

	/**
	 * 社区动态--我参与的帖子
	 */
	public function myjoindtoplist(){
		$myjoindtoplist =  (new DiscuzService())->myreplay(['userid' => session('user')['id'],'myjoin'=>'']);	
		if(!$myjoindtoplist){
			return response() -> json(Ajax('0','没有数据',''));
		}
		return  response() -> json(Ajax('1','数据集合',$myjoindtoplist));
	}	

	/**
	 * 帖子被评论了查看
	 */
	public function repletometop(){
		$discuzservice = (new DiscuzService())->serrepletometopser();
		return response() -> json(Ajax('1','数据集合',$discuzservice));
	}

	/**
	 * 查看回复时的逻辑
	 */
	public function topdetailstatus(Request $request){
		$id = $request ->get('id');
		$discuzservice = (new DiscuzService())->topdetailstatus($id);
		return response() -> json(Ajax('1','数据集合',$discuzservice)); 
	}
}
