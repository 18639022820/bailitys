<?php
namespace App\Http\Controllers\Home;
use App\model\Users;
use App\model\BloodSuga;
use App\model\BloodPress;
use App\model\BoodAllCholesterol;
use App\model\BloodDiolCholesterol;
use App\model\BloodHigProteinCholesterol;
use App\model\BloodLowProteinCholesterol;
use Illuminate\Http\Request;
use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Cache;
use App\Service\BloodService;
use Illuminate\Support\Facades\DB;

/**
 * 血糖，血压，蛋白
 */
class BloodParameterController extends AppController
{

    /**
     * 血糖添加
     */
    public function bloodsuga(Request $request){
    	if((new BloodSuga())->add($request->all())){
             return  response()->json(Ajax('1','保存成功',''));
    	}	
    }

    /**
     * 血糖记录
     */
     public function getbloodsuga(){
        $history = (new BloodService())->getbloodhistry([]);
        return  response()->json(Ajax('1','血糖记录', $history));
     }
    /**
     *血压添加
     */
    public function bloodpress(Request $request){
    	if((new BloodPress())->add($request->all())){
    		 return  response()->json(Ajax('1','保存成功',''));
    	}
    }

    /**
     * 蛋白所有指标
     */
    public function bloodallcholesterol(Request $request){
    	if((new BoodAllCholesterol())->add($request->all())){
    		 return  response()->json(Ajax('1','保存成功',''));
    	}	
    }

    /**
     * 二醇蛋白
     */
    public function blooddiolcholesterol(Request $request){
    	if((new BloodDiolCholesterol())->add($request->all())){
    		 return  response()->json(Ajax('1','保存成功',''));
    	}	
    }

    /**
     * 高蛋白
     */
    public function bloodhigproteincholesterol(Request $request){
    	if((new BloodHigProteinCholesterol())->add($request->all())){
			 return  response()->json(Ajax('1','保存成功',''));
		}
    }

    /**
     * 低蛋白蛋白
     */
    public function bloodlowproteincholesterol(Request $request){
    	if((new BloodLowProteinCholesterol())->add($request->all())){
    	 	 return  response()->json(Ajax('1','保存成功',''));
    	}	
    }
    
    /**
     * 血液分析
     */
    public function bloodanalyse(Request $request){
        $bloodservice  = new  BloodService();
    
        //var_dump($request->all());return;
        $blood = $bloodservice  ->analyse($request->all());
        return  $blood;
    }
    
}
