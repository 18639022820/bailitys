<?php
use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
DB::listen(function($sql) {
    //dump($sql->sql);
    //echo $sql->sql;
});
//Closure跨域设置

//该路由是从聊天服务器上获取后天资讯师的界面

/**
 * http://www.zhizhaow.com/index.php/home/home/getadminbun?
 */

/********************Api路由组****************************************/
/**
 * 首页的几个判断
 */
 

//Route::any('/','Home\HomeController@regist');
Route::group(['middleware' => ['web','Closure']], function () {
	//网页首页，不是App的
	Route::any('/','Home\HomeController@index');
	//登录/username=admin&password=123
	Route::any('/login','Home\HomeController@login');
	//退出登录
	Route::any('/logout','Home\HomeController@logout');
	//注册,resources\views\home.blade.php注册
	Route::any('/regist','Home\HomeController@regist');
	//发送短信
	Route::any('/sendmesage','Home\HomeController@sendmesage');
	//短信验证-登录
	Route::any('/sendvritey','Home\HomeController@sendvritey');
	//短信验证
	Route::any('/verification','Home\HomeController@verification');
	//电话生成用户名密码
	Route::any('/loginseed','Home\HomeController@loginseed');
	//轮播图
	Route::any('/lunbopic','Home\HomeController@lunbopic');	
	//帖子一次拉取
	Route::any('/discuz/distoplist','Home\DiscuzController@distoplist');

});

/**
 * 用户信息验证跟跨域
 */
Route::group(['middleware' => ['web','chekLogin','Closure']], function () {
	//获取用户信息
	Route::any('/userinfo','Home\HomeController@userinfo');	
	//保存用户信息
	Route::any('/saveuseinfo','Home\HomeController@saveuseinfo');
	//获取用户积分
	Route::any('/userinfo/getuserpoint','Home\UserInfoController@getuserpoint');
});

/**
 * 该组是获取session必须的
 */
Route::group(['middleware' => ['web','chekLogin','Closure']], function () {
	//测试
	Route::any('/test','Home\HomeController@test');
	//血糖保存
	Route::any('/bloodparameter/bloodsuga','Home\BloodParameterController@bloodsuga');
	//血糖记录拉取
	Route::any('/bloodparameter/getbloodsuga','Home\BloodParameterController@getbloodsuga');
	//血压保存
	Route::any('/bloodparameter/bloodpress','Home\BloodParameterController@bloodpress');
	//蛋白所有指标
	Route::any('/bloodparameter/bloodallcholesterol','Home\BloodParameterController@bloodallcholesterol');
	//二醇蛋白
	Route::any('/bloodparameter/blooddiolcholesterol','Home\BloodParameterController@blooddiolcholesterol');
	//高蛋白
	Route::any('/bloodparameter/bloodhigproteincholesterol','Home\BloodParameterController@bloodhigproteincholesterol');
	//低蛋白蛋白
	Route::any('/bloodparameter/bloodlowproteincholesterol','Home\BloodParameterController@bloodlowproteincholesterol');
	//血液成分分析
	Route::any('/bloodparameter/bloodanalyse','Home\BloodParameterController@bloodanalyse');
	//生成邀请码
	Route::any('/invite','Home\HomeController@invite');
	//显示用户资产
	Route::any('money','Home\HomeController@money');
});

/**
 * 帖子路由
 */
Route::group(['middleware' => ['web','chekLogin','Closure']], function () {
	//帖子保存图片
	Route::any('/discuz/savepic','Home\DiscuzController@savepic');
	//发布帖子
	Route::any('/discuz/savetop','Home\DiscuzController@savetop');
	//回复帖子
	Route::any('/discuz/savereplytop','Home\DiscuzController@savereplytop');
	//回复回复
	Route::any('/discuz/saveaddrerelay','Home\DiscuzController@saveaddrerelay');
	//帖子详情
	Route::any('/discuz/distopdetail','Home\DiscuzController@distopdetail');
	//点赞
	Route::any('/discuz/famous','Home\DiscuzController@famous');
	//我发布的贴子
	Route::any('/discuz/mytoplist','Home\DiscuzController@mytoplist');
	//我参与的帖子
	Route::any('/discuz/myjoindtoplist','Home\DiscuzController@myjoindtoplist');
	//回复我的帖子
	Route::any('/discuz/repletometop','Home\DiscuzController@repletometop');
	//查看回复我的帖子详情	参数id
	Route::any('/discuz/topdetailstatus','Home\DiscuzController@topdetailstatus');


});

/**
 * 用户积分签到
 */
Route::group(['middleware' => ['web','chekLogin','Closure']], function () {
	//签到，获或者第一次签到
	Route::any('/upoint/singinpoint','Home\UserPointController@singinpoint');
	//积分抽奖
	Route::any('/upoint/pointprize','Home\UserPointController@pointprize');
});

/**
 * 文章
 */
Route::group(['middleware' => ['web']], function () {
	//文章列表
	Route::any('/article/articlelist','Home\ArticleController@articlelist');
});



/****************************Api路由结束**********************************************************/




//获取token
// Route::get('gettoken', function () {
// 	return getcsrft();
// });
// //设置token
// Route::get('settoken', function () {
// 	return setcsrft();
// });
//测试的
Route::get('/test/test','Test\Home\HomeController@index');

/**********************************Admin后台*********************/
/**
 * 后台
 */
Route::group(['middleware' => ['web','AdminCheckLogin']], function () {
	Route::any('/admin/index','Admin\AdminToolController@index');	
	//文章ajax上传图片
	Route::any('/adarticle/savepic','Admin\AdminArticleController@savepic');
	//后台文章添加
	Route::any('/adarticle/addartice','Admin\AdminArticleController@addartice');
	//后台文章列表
	Route::any('/adarticle/articlelist','Admin\AdminArticleController@articlelist');
	//删除文章
	Route::get('/adarticle/delearticle','Admin\AdminArticleController@delearticle');
});
/**
 * Tool工具
 */
Route::group(['middleware' => ['web','AdminCheckLogin']], function () {
	//轮播图
	Route::any('/admin/tool/lunboto','Admin\AdminToolController@lunboto');
	//编辑单个轮播
	Route::any('/admin/tool/editlunboto','Admin\AdminToolController@editlunboto');
	//上传图片
	Route::post('/admin/tool/upimg','Admin\AdminToolController@upimg');	
	//上传图片
	Route::post('/admin/tool/lunbotusane','Admin\AdminToolController@lunbotusane');	
	//钱包管理
	Route::get('/admin/tool/wallet','Admin\AdminToolController@wallet');
	//钱包管理
	Route::get('/admin/tool/perwalletadmin/{uid}.html','Admin\AdminToolController@perwalletadmin');
	//后台管理用户的钱包，加钱
	Route::post('/admin/tool/savepersonwallbyadmin','Admin\AdminToolController@savepersonwallbyadmin');
});
/**
 * 后台未登录时的情形
 */
Route::group(['middleware' => ['web',]], function () {
	//登录界面
	Route::any('/admin/login/login','Admin\AdminLoginController@login');	
	
});
	
Route::any('tmd',function(){
	return '终于好了';
});
Route::any('dd','My\TmdController@qq');
Route::any('addadmin','Admin\AdminToolController@addadmin');
Route::any('look','Admin\AdminToolController@look');
Route::any('what','Admin\AdminToolController@getlunbo');
/***********************************Adminend*********************/
