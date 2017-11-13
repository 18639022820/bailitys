<?php

namespace App\model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
class AdminUsers extends Model
{ 
    protected $table='admin_users';
    protected $primaryKey='id';
    public $timestamps=false;
    protected $guarded=[];

    /**
     * 添加
     */
   /*  public function add($data){
		$this->username =$data['username'];
		$this->password =$data['password'];
        $this->type =$data['type'];
		$this->addtime =time();
		if($this->save()){
			return 1;
		}
		return 0;
    } */


}
