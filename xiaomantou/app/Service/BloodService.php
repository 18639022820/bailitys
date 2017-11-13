<?php

namespace App\Service;
use App\model\BloodSuga;
use App\ToolS\BloodAly;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * 血液分析
 */
class BloodService
{ 
	/**
	 * 血糖分析
	 */
   	public function analyse(array $data){
   		$userid =session('user')['id'];
   		$time1  =(int)$data['time1'];
   		$time2  =(int)$data['time2'];
   		$list = BloodSuga::where('userid', '=', $userid)->whereBetween('addtime', [$time1, $time2])->get()->toArray();
   		$result = BloodAly::anyslizey('suga',$list);
   		return $result;
   	}

   /**
    * 获取血糖历史记录
    * @return [array] [血糖历史记录]
    */
   public function getbloodhistry(array $data){
      $userid =session('user')['id'];
      $boodhistory =  BloodSuga::where('userid',$userid)
                      -> whereBetween('addtime', [1, 1505544679])->get()->toArray();
      for($i=0;$i < count($boodhistory);$i++){
            $boodhistory[$i]['addtime'] = date('Y-m-d:H:i',$boodhistory[$i]['addtime']) ;
      }

      return $boodhistory;
   }

}
