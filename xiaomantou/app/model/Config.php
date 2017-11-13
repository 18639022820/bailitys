<?php

namespace App\model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
class Config extends Model
{ 
    protected $table='config';
    protected $primaryKey='id';
    public $timestamps=false;
    protected $guarded=[];

    /**
     * 添加
     */
    public function add($data){
		$this->name =$data['name'];
		$this->value =$data['value'];
		$this->addtime =time();
		if($this->save()){
			return 1;
		}
		return 0;
    }

    /**
     * 获取到配置数据，从缓存中获取，1分钟的限制
     */
    public function getconfig($mesg){
       $config = Cache::get('bun_congig'.$mesg);
         if(!$config){
         $config =  $user = DB::table('config')->where('name', $mesg)->first(); 
           Cache::add('bun_congig'.$mesg,  $config , 1);
       }
       return  unserialize( $config ->value);
    }

}
