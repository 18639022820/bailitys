<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class DiscuzTopis extends Model
{
    protected $table='discuz_topdis';
    protected $primaryKey='id';
    public $timestamps=false;
    protected $guarded=[];

    /**
     * 添加
     */
    public function add($data){
			$this->userid    =     $data['userid'];
			$this->content   =    $data['content'];
			$this->addtime   =    time();
            $this->xmap      =  $data['xmap'];
            $this->ymap      =  $data['ymap'];
            $this->province  =  $data['province'];
            $this->city      =  $data['city'];
            $this->username  =  $data['username'];
            $this->district  =  $data['district'];
            $this->blockid   =  $data['blockid'];
            $this->blockname =  $data['blockname'];
            $this->sexid     =  $data['sexid'];
            $this->sexcn     =  $data['sexcn'];
            $this->scanl     =  $data['scanl'];
            $this->famous    =   0;
		if($this->save()){
			return $this->id;
		}
		return 0;
    }
    
}
