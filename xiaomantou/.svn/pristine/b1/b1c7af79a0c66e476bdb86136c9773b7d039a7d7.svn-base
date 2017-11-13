<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class BloodSuga extends Model
{ 
    protected $table='blood_suga';
    protected $primaryKey='id';
    public $timestamps=false;
    protected $guarded=[];
    
    /**
     * 添加
     */
    public function add($data){
		$this->range =$data['range'];
		$this->measurtime =$data['measurtime'];
		$this->mark =$data['mark'];
		$this->addtime =time();
        $this->userid =session('user')['id'];
		if($this->save()){
			return 1;
		}
		return 0;
    }
}
