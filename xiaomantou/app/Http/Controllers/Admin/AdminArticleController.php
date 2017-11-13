<?php

namespace App\Http\Controllers\Admin;
use App\model\ArticleTitle;
use App\Service\ArticleService;
use App\Service\DiscuzService;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;

/**
 * 文章发表
 */
class AdminArticleController extends AdminController
{

	
	
	/**
	 * 图片保存
	 */
	public function savepic(Request $request){
		$imagebase64 = $request->input('data');
		$data = $this->UploadfiletoBun($imagebase64,'article');
		$dafile= ['name'=>$data['name'],'fullpath'=>$data['fullpath']];
		return response() -> json(Ajax($data['staus'],'保存成功',$dafile));
	}

	/**
	 * 保存文章
	 */
	public function addartice(Request $request){
		if($post = $request->all()){
			$articleservice = new ArticleService();
			$res = $articleservice ->addartic($post);
       		if($res){
				return redirect('adarticle/articlelist');
       		}
		}
		return view('admin/article/addartice');
	}

	/**
	 * 文章列表
	 */
	public function  articlelist(){
		$articleservice = new ArticleService();
		$res = $articleservice -> articlelist();
		return view('admin/article/articlelist',['arlit'=>$res]);
	}

	/**
	 * 删除文章
	 */
	public function delearticle(Request $request){
		$id  =  $request -> get('id');
		ArticleTitle::destroy($id);
	    return redirect('adarticle/articlelist');
	}
}
