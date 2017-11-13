<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class UserPoint extends Model
{
    protected  $table  =  'user_point';
    protected  $primaryKey = 'id';
    public  $timestamps = false;
    protected  $guarded =  [];

    /**
     * 保存积分
     */
    public function add($data){
        $this->userid  = $data['userid'];
    	$this->point = $data['point'];
    	$this->addtime = time();
    	if($this->save()){
    		return 1;
    	}
    	return 0;
    }

    /**
     * 查询一条
     */
    public function findOne($userid){
    	return $this::where('userid',$userid)->get()->toArray();
    }
}
