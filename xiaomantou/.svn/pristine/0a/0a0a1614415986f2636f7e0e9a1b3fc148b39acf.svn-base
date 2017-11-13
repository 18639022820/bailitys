<?php

namespace App\ToolS;
class BloodAly{ 
    
    //综合数据分析  
    static function anyslizey($suga,array $data) {
        switch ($suga) {
            case 'suga':
                $result = self::suga($data);
                break;
            
            default:
            
                break;
        }
      return $result;
    }

    /**
     * 血糖分析
     * @return [type] [description]
     */
    static  protected function suga($data){
        $zhexiantu_x   =  [];
        $zhexiantu_y   =  [];
        $bingzhuangtu  =  [];
        //折线图
        if(!count($data)) return ['zhexian'=>['x'=>null,'y'=>null],'cicle'=>null];
        foreach ($data as $key => $value) {
            array_push($zhexiantu_x, date('Y-m-d:H:i',$value['addtime'])); 
            array_push($zhexiantu_y, $value['range']); 
        }
        $xiaoyu6 =0;
        $dayu9  =0;
        if(count($data)=='0')return;
        foreach ($data as $key => $value) {
            if($value['range'] > 8 )$dayu9++;
            if($value['range'] < 6 )$xiaoyu6++;
        }
        $zhengchang3 = count($data)-$xiaoyu6-$dayu9;
        $xiaoyu =  round($xiaoyu6/count($data),5);
        $dayu =  round($dayu9/count($data),5);
        $zhengchang =  1- $xiaoyu- $dayu ;
        $cicle = [['name'=>'血糖偏低','value'=>$xiaoyu],['name'=>'血糖正常','value'=>$zhengchang],['name'=>'血糖偏高','value'=>$dayu]];
       return ['zhexian'=>['x'=>$zhexiantu_x,'y'=>$zhexiantu_y],'cicle'=>$cicle];
    }
  
}