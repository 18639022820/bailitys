<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class UserMoneyWallet extends Model
{
    protected $table='user_money_wallet';
    protected $primaryKey='id';
    public $timestamps=false;
    protected $guarded=[];

    public function add($data){
        $this->money         =     $data['money'];
    	$this->userid        =     $data['userid'];
    	$this->mark          =     $data['mark'];
    	$this->userinfo      =     $data['userinfo'];
        $this->adminscore    =     $data['adminscore'];
    	$this->addtime       =     time();
    	if($this->save()){
    		return 1;
    	}
    	return 0;
    }

    /**
     * 查询一条
     */
    public function findOne(){
    	
    }
}
