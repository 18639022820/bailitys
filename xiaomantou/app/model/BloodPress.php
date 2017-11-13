<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class BloodPress extends Model
{ 
    protected $table='blood_press';
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
        $this->shrinkpress =$data['shrinkpress'];
        $this->relaxationpress =$data['relaxationpress'];
		$this->addtime =time();
        $this->userid =session('user')['id'];
		if($this->save()){
			return 1;
		}
		return 0;
    }
}
