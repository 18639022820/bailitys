<?php

namespace App\model;
use App\ToolS\Time;
use Illuminate\Database\Eloquent\Model;

class UserPointLog extends Model
{
    protected $table='user_point_log';
    protected $primaryKey='id';
    public $timestamps=false;
    protected $guarded=[];

    /**
     * 保存积分
     */
    public function add($data){
        $this->userid =$data['userid'];
    	$this->point =$data['point'];
        $this->pointtype =$data['pointtype'];
    	$this->addtime =Time::zorotimespan();
    	if($this->save()){
    		return 1;
    	}
    	return 0;
    }

    /**
     * 查询一条
     */
    public function findOne($userid){
    	return $this::where('userid',$userid);
    }
}
