<?php

namespace App\model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
class ArticleTitle extends Model
{ 
    protected $table='article_title';
    protected $primaryKey='id';
    public $timestamps=false;
    protected $guarded=[];

    /**
     * 添加
     */
    public function add($data){
		$this->name =$data['name'];
		$this->content =$data['content'];
        $this->simallpic =$data['simallpic'];
        $this->bigpic =$data['bigpic'];
        $this->httpali =$data['httpali'];
		$this->addtime =time();
		if($this->save()){
			return 1;
		}
		return 0;
    }

    /**
     * 获取到配置数据，从缓存中获取，1分钟的限制
     */


}
