<?php
namespace App\Service;
use App\model\DiscuzTopis;
use App\model\DiscuzImg;
use App\model\DiscuzRepl;
use App\model\DiscuzFamous;
use App\model\UserInfo;
use App\Service\UserInfoService;
use Illuminate\Support\Facades\DB;
class DiscuzService
{ 
	/**
	 * 添加主题
	 */
   	public function addtop($parm){
   		$userid = session('user')['id'];
   		$parm['userid'] = $userid;
   		$id = (new DiscuzTopis())->add($parm);
   		if(!$parm['img'])return $id;		
   		if($id&&$parm['img']){
   			$img = explode(',',$parm['img']);
   			foreach ($img as $key => $value) {
   				(new DiscuzImg())->add(['userid' => $userid ,'img'=>$value,'topid'=>$id]);
   			}
   		}

   	}

   	/**
   	 * 回复主贴
   	 * addreplay
   	 */
    public function addreplay($parm){
        $restlr  =   DiscuzRepl::where('topid',$parm['topid'])
                        -> where('status', '=', 1)  ->   orderBy('id', 'desc')
                        -> select('id','topid','status','statusid')-> get() -> toArray();
        if($restlr){
           $parm['statusid']     = (int)$restlr[0]['statusid'] + 1 ;
        }else{
           $parm['statusid']     = 1;
        }
        $parm['topstatus']    = 0;
        $parm['isreplylook']  = 0;
        $parm['istoplook']    = 0;
        $parm['status']       = 1;
        $parm['replaytopid']  = 0;
        if((new DiscuzRepl()) -> add($parm)){
          return 1;
        }
        return 0;
    }

    /**
     * 回复回复
     */
     public function addrerelay($parm){
        $parm['statusid']     = 0;
        $parm['topstatus']    = 0;
        $parm['isreplylook']  = 0;
        $parm['istoplook']    = 0;
        $parm['status']       = 0;
        if((new DiscuzRepl())->add($parm)){
          return 1;
        }
        return 0;
     }

     /**
      * 社区list
      */
     public function  dislistrun(array $data=[]){
        //我发布的帖子
        if(array_key_exists('mytop',$data)){
             $restlr  =   DiscuzTopis::orderBy('id', 'desc')->where('userid',$data['userid'])->select('*')->paginate(10)->toArray(); 
        }
        //社区首页拉取
        if(empty($data)){
            $restlr  =   DiscuzTopis::orderBy('id', 'desc')->select('*')->paginate(10)->toArray(); 
        }
        //查询回复的帖子
        if(array_key_exists('replaydir',$data)){
             $restlr  =   DiscuzTopis::orderBy('id', 'desc')->whereIn('id',$data['id'])->select('*')->paginate(10)->toArray(); 
        } 
        foreach ($restlr['data'] as $key => &$value) {
            $status  =  $this->isfamous($value['id'],session('user')['id']);
            $restlr['data'][$key]['isfamous'] =  $status ? 1 :0; 
            $restlr['data'][$key]['addtime'] = date('Y-m-d H:i',$value['addtime']);
            $diet  = $this->dealreplay($value['id']);
            $restlr['data'][$key]['topimg'] = $this->topimg($value['id']);
            $tologo =  UserInfo::find($value['userid']);
            if(!empty($tologo)){
               $restlr['data'][$key]['logo'] = attach('userlogo',$tologo->logo); 
            }else{
               $restlr['data'][$key]['logo'] = 1; 
            }
            $restlr['data'][$key]['replaye'] =$diet;
        }
       return $restlr;
     }

    /**
     * disdtal   帖子详情
     */
    public function disdtal($id){
        $result  =   DiscuzTopis::find($id);
        if(!$result)return 0;
        $result  = $result->toArray();
        $result['logo'] =UserInfoService::userattachlogo($result['userid']);

        $result['topimg'] = $this->topimg($result['id']);
        $repla   =   DiscuzRepl::where('topid',$id)->where('status', '=', 1)
                          ->orderBy('id', 'desc')->select('*')->get()->toArray();
        $status  = $this->isfamous($id,session('user')['id']);
        $result['isfamous']  =  $status ? 1 :0;
        $detailelist  = []; $detailelist['top']= $result;
        foreach ($repla as $key => &$value) {
             $smalblock  =  DiscuzRepl::where('topid',$id)->where('status', '=', 0)
                            ->where('replaytopid', '=', $value['id'])
                            ->orderBy('id', 'desc')->select('*')->get()->toArray();
                      foreach ($smalblock as $keysmalblock => &$valuesmalblock) {
                        $valuesmalblock['prelogo']=UserInfoService::userattachlogo($value['userid']);
                        $valuesmalblock['befologo']=UserInfoService::userattachlogo($value['replayuid']);
                      }
           $value['replay'] = $smalblock ;
           $value['prelogo']=UserInfoService::userattachlogo($value['userid']);
           $value['befologo']=UserInfoService::userattachlogo($value['replayuid']);
           $detailelist['replay'][] = $value;
        }
       return $detailelist;
    }

    /**
     * 是否点赞
     */
    public function isfamous($topid,$userid){
        $isfam = DiscuzFamous::where('topid', '=',  $topid)
                    ->where('userid', '=', $userid)->get();
        if ($isfam->isEmpty())return false;
        return true;
    }

    /**
     * 点赞
     */
    public function famous($topid){
       $userid = session('user')['id'];
       $sattus  =  $this->isfamous($topid,$userid);
       if($sattus){
          DiscuzFamous::where('topid', '=',  $topid)->where('userid', '=', $userid)->delete();
          DiscuzTopis::where('id', '=',  $topid)-> decrement('famous', 1);
          return 0;
       }else{
          $data =['topid' => $topid ,'userid' => $userid,'isfamous'=>1];
          (new  DiscuzFamous())->add($data);
          DiscuzTopis::where('id', '=',$topid) -> increment('famous', 1);
          return 1;
       }
    }

    /**
     * 获取参与的帖子
     */
    public function myreplay(array $data){
        $repla  =   DB::table('discuz_repl')->distinct()->select('topid')->where('userid', '=', $data['userid'])->paginate(10);
        if($repla->toArray()){
           $lis = $repla->toArray()['data'];
           $idlist=[];
           foreach ($lis as $key => $value) {
             array_push($idlist,$value->topid);
           }
           $result = $this->dislistrun(['replaydir'=>'','id' =>$idlist]);
           return $result;
        }
        return 0;
    }

    /**
     * 帖子回复首页的拉取
     */
    public function dealreplay($topid){
       $result = DiscuzRepl::where('topid',$topid) ->orderBy('id', 'desc')
                  ->select('*')->get()->toArray();
            if(!empty($result)){
                foreach ($result as $key => &$value) {
                   $replayuid =  UserInfo::find($value['replayuid']);
                   $userid   =  UserInfo::find($value['userid']);
                   if(!empty($userid)){
                      $value['userlogo'] = attach('userlogo',$replayuid['logo']); 
                   }else{
                      $value['userlogo'] =1;
                   }
                   if(!empty($replayuid)){
                      $value['replaylogo'] = attach('userlogo',$replayuid['logo']); 
                   }else{
                      $value['userlogo'] =1;
                   }
                }
                return $result; 
            }
        return  1;
    }

    /**
     * 回复我的第一次查询
     */
    public function serrepletometopser(){
        $userid = session('user')['id'];
        $discuz = DiscuzRepl::where(function($query) use($userid){
                      $query->where('topuserid', $userid)
                      ->where('topstatus', 0);
                  })
                  ->orWhere(function ($query) use($userid){
                       $query->where('replayuid', $userid)
                             ->where('replystatus', 0);
                  })->select('topid')->get()->toArray();
        $restlr  =   DiscuzTopis::orderBy('id', 'desc')->whereIn('id',$discuz)->select('*')->paginate(10)->toArray(); 
          foreach ($restlr['data'] as $key => &$value) {
              $status  =  $this->isfamous($value['id'],session('user')['id']);
              $restlr['data'][$key]['isfamous'] =  $status ? 1 :0; 
              $restlr['data'][$key]['addtime'] = date('Y-m-d H:i',$value['addtime']);
              
              $restlr['data'][$key]['topimg'] = $this->topimg($value['id']);
              $diet   = $this->dealreplay($value['id']);
              $tologo  =  UserInfo::find($value['userid']);
              if(!empty($tologo)){
                 $restlr['data'][$key]['logo'] = attach('userlogo',$tologo->logo); 
              }else{
                 $restlr['data'][$key]['logo'] = 1; 
              }
              $restlr['data'][$key]['replaye'] =$diet;
          }
       return $restlr; 
    }

    /**
     * [topdetailstatus 转台改变]
     * @return [type] 返回帖子详情数据
     */
    public function topdetailstatus($id){
        //状态改变逻辑
        $userid = session('user')['id'];
        DiscuzRepl::where('topid',$id)->where('topuserid', '=', $userid)
               ->update(['topstatus' => 1]);
        DiscuzRepl::where('topid',$id)->where('replayuid', '=', $userid)
               ->update(['replystatus' => 1]);
       /**
        *返回帖子详情
        */  
       $detailelist = $this ->disdtal($id);
       return $detailelist;
    }

    /**
     * 帖子的图片
     */
    public function topimg($topid){
        $topimg  =  DiscuzImg::where("topid",$topid)->get();
        if($topimg->isEmpty()){
          return 1;
        }else{
          return $topimg -> toArray();
        } 
    }
}

