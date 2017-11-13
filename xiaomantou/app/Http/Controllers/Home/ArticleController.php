<?php

namespace App\Http\Controllers\Home;
use App\model\ArticleTitle;
use App\Service\ArticleService;
use App\Service\DiscuzService;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;

/**
 * 文章发表
 */
class ArticleController extends AdminController
{
	/**
	 * 文章列表
	 */
	public function  articlelist(){
		$articleservice = new ArticleService();
		$res = $articleservice ->articlelist();
		return response()->json(Ajax('1','保存成功',$res));
	}

	/**
	 *文章查看
	 * @return
	 */
	
}


