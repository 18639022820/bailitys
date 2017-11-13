<?php

namespace App\Service;
use App\model\UserPointLog;
use App\model\UserPoint;
use App\ToolS\Time;
use App\model\UserPrize;
use App\model\ConfigApp;
use Illuminate\Database\Eloquent\Model;

class UserpointService
{ 
   public function pointdate(){
   	  $res = $this -> _checkpoint();
   	  if($res){
   	  		return 0;
   	  }
   	  $userpointlog   =	new UserPointLog();
   	  $data =['userid'=>session('user')['id'],'point' =>30,'pointtype'=>'singe'];
   	 
   	  $userpointlog  ->add($data);

   	  $inpoint = $this->_checkisingpoint();

   	  if($inpoint){
   	  		UserPoint::where('userid', '=', session('user')['id'] )-> increment('point', 30);
   	 		return 1;
   	  }else{
   	  		$userpoint = new UserPoint();
   	  		$userpoint ->add(['userid'=> session('user')['id'],'point' =>100]);
   	  		UserPoint::where('userid', '=', session('user')['id'] )-> increment('point', 30);
   	  		return 1;
   	  }
   }

   /**
    * 检查是否在当天的日志中
    */
   public function _checkpoint(){
   		$cheres  =	UserPointLog::where('addtime',Time::zorotimespan())
   		 			       ->where('userid',session('user')['id'])->select('*')->get();
   		if($cheres->toArray()){
   			return 1;
   		}
   		return 0;
   }

   /**
    * 检查积分表中是否存在
    */
   public function _checkisingpoint(){
   		$cheres  =	UserPoint::where('userid',session('user')['id'])->select('*')->get();
  		if($cheres->toArray()){
   			return 1;
   		}
   		return 0;
   }

    //获取中奖字符串
    public function getRandmNo(){
      $point = ConfigApp::find(5)->toArray();
      if($this->checkPoint($point["value"])){
        if($this->PointDec($point["value"])){
            return \App\Tools\DCSAES::endcode($this->ranDomstr());
        }else{
          return 2;
        }
      }else{
        return false;
      }
    }

    //产生中奖号码，插入数据库
    protected function ranDomstr(){
      $srt=rand(0,200);
      if($srt==1){
        $data=["userid"=>session('user')['id'],"prizeid"=>1,
                'prizeinfo' => '10元话费',"tele"=>session('user')["tele"]];
        $userprize = new UserPrize();
        $res = $userprize ->add($data);
        if(!$res){
          return 0;
        }
        return 1;
      }else{
        return 0;
      } 
    }

    /**
     * 检查是否有积分
     */
    public function checkPoint(){
       $jifen = (new UserPoint())->findOne(session('user')['id']);
       if($jifen){
            if($jifen[0]['point'] > 101){
              return 1;
            }
            return 0;
       }
       return 0;
    }

    /**
     * 减去积分
     */
    public function PointDec($point){
       $isdeal =  UserPoint::where('userid', '=', session('user')['id'] )-> decrement('point',$point);
       return $isdeal;
    }
}
