<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class UserPrize extends Model
{ 
    protected $table='user_prize';
    protected $primaryKey='id';
    public $timestamps=false;
    protected $guarded=[];

    /**
     * 添加
     */
    public function add($data){
		$this->userid =$data['userid'];
		$this->prizeid =$data['prizeid'];
        $this->tele =$data['tele'];
		$this->addtime =time();
        $this->prizeinfo =$data['prizeinfo'];
		if($this->save()){
			return 1;
		}
		return 0;
    }
}
