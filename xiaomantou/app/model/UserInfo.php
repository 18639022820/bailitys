<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $table='userinfo';
    protected $primaryKey='id';
    public $timestamps=false;
    protected $guarded=[];

    public function add($data){
     	if($this->findOne($data['username'])){
     		return 0;
     	}
        $this->id        =     $data['id'];
    	$this->username  =     $data['username'];
    	$this->tele      =     $data['tele'];
    	$this->logo      =     $data['logo'];
        $this->address   =     $data['address'];
    	$this->nickname  =     $data['nickname'];
    	$this->addtime   =     time();
    	if($this->save()){
    		return 1;
    	}
    	return 0;
    }

    /**
     * 查询一条
     */
    public function findOne($username){
    	return $this::where('username',$username);
    }
}
