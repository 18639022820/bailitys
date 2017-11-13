<?php

namespace App\Service;
use App\model\ArticleTitle;
class ArticleService
{ 
	/**
	 * 保存文章
	 */
	public function addartic(array $data){
		$articletitle  =  new ArticleTitle();
		//var_dump($data);return;
		$article = ['name'=>$data['name'],'content'=>$data['content'],
					'simallpic' =>$data['simallpic'],'bigpic'=>$data['bigpic'],
					'httpali'	=>$data['httpali']
					];
		$res = $articletitle ->add($article );
		return $res;
	}

	/**
	 * 文章列表
	 */
	public function articlelist(){
		$articletitlelist = ArticleTitle::orderBy('name', 'desc') ->paginate(15);
		foreach ($articletitlelist as $key => &$value) {
			if($value->simallpic){
				$value -> simallpic=attach('article',$value->simallpic);
			}
			if($value->bigpic){
				$value->bigpic=attach('article',$value->bigpic);
				$value->time  = date('Y-m-d:H:i',$value->addtime);
			}
		}
		return $articletitlelist;
	}

	
}
