<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
class ConfigApp extends Model
{ 
    protected $table='config_app';
    protected $primaryKey='id';
    public $timestamps=false;
    protected $guarded=[];

    /**
     * 添加
     */
    public function add($data){
		$this->name =$data['name'];
		$this->value =$data['value'];
        $this->type =$data['type'];
        $this->discri =$data['discri'];
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
       $config = Cache::get('bun_app_congig_app'.$mesg);
         if(!$config){
         $config =  $user = DB::table('config_app')->where('name', $mesg)->get()->toArray(); 
         Cache::add('bun_app_congig_app'.$mesg,  $config , 0);
       }
       return  $config;
    }

    /**
     * name跟type共同决定
     */
    public function getconfigpoint($mesg,$type){
        $config = Cache::get('bun_app_congig_app_point' . $mesg);
             if(!$config){
             $config =  $user = DB::table('config_app')->where('name', $mesg)
                                    ->where('type', $type)
                                    ->get()->toArray(); 
             Cache::add('bun_app_congig_app_point'.$mesg,  $config , 0);
       }
       return  $config;
    }
}
