<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class DiscuzFamous extends Model
{
    protected $table='discuz_famous';
    protected $primaryKey='id';
    public $timestamps=false;
    protected $guarded=[];

    /**
     * 添加
     */
    public function add($data){
		$this->userid   =  $data['userid'];
		$this->topid    =  $data['topid'];
        $this->isfamous =  $data['isfamous'];  
		$this->addtime  =  time();
		if($this->save()){
			return 1;
		}
		return 0;
    }
    
}
