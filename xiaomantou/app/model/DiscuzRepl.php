<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class DiscuzRepl extends Model
{
    protected $table='discuz_repl';
    protected $primaryKey='id';
    public $timestamps=false;
    protected $guarded=[];

    /**
     * 添加回复的字段
     */
    public function add($data){
			$this->topid =$data['topid'];
            $this->topuserid =$data['topuserid'];
			$this->topusername =$data['topusername'];
			$this->userid =$data['userid'];
            $this->username =$data['username'];
            $this->replayuid = $data['replayuid']; 
            $this->replayusername = $data['replayusername']; 
            $this->content =$data['content'];
            $this->xmap =$data['xmap'];
            $this->ymap =$data['ymap'];
            $this->province =$data['province'];
            $this->city =$data['city'];
            $this->district =$data['district'];
            $this->topstatus =$data['topstatus'];//逻辑字段
            $this->isreplylook =$data['isreplylook'];
            $this->status = $data['status'];
            $this->statusid = $data['statusid'];
            $this->replystatus = $data['replystatus'];
            $this->replaytopid = $data['replaytopid'];
            $this->addtime =time();
		if($this->save()){
			return 1;
		}
		return 0;
    }
    
}
