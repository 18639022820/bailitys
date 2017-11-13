<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class DiscuzImg extends Model
{
    protected $table='discuz_img';
    protected $primaryKey='id';
    public $timestamps=false;
    protected $guarded=[];

    /**
     * 添加
     */
    public function add($data){
			$this->topid = $data['topid'];
			$this->img = $data['img'];
			$this->addtime =time();
		if($this->save()){
			return 1;
		}
		return 0;
    }
    
}
