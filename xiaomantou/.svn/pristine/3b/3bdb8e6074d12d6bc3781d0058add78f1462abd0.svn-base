<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class LogWallet extends Model
{
    protected $table='log_wallet';
    protected $primaryKey='id';
    public $timestamps=false;
    protected $guarded=[];

    /**
     * 添加
     */
    public function add($data){
			$this->username   =     $data['username'];
			$this->userid     =    $data['userid'];
			$this->addtime    =    time();
            $this->type       =  $data['type'];
            $this->score      =  $data['score'];
            $this->admin      =      $data['admin'];
            $this->beizhu     =  $data['beizhu'];
		if($this->save()){
			return $this->id;
		}
		return 0;
    }
    
}
