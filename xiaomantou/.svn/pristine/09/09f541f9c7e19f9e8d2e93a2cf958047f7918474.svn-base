<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class BloodLowProteinCholesterol extends Model
{ 
    protected $table='blood_low_protein_cholesterol';
    protected $primaryKey='id';
    public $timestamps=false;
    protected $guarded=[];

    /**
     * 添加
     */
    public function add($data){
		$this->range =$data['range'];
		$this->measurtime =$data['measurtime'];
		$this->addtime =time();
        $this->mark =$data['mark'];
        $this->userid =session('user')['id'];
		if($this->save()){
			return 1;
		}
		return 0;
    }
}
