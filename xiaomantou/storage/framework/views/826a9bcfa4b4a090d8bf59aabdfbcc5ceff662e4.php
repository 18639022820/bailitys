
<?php $__env->startSection('title'); ?>首页<?php $__env->stopSection(); ?>

<?php $__env->startSection('link'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(url('/')); ?>/css/layui.css">
<link rel="stylesheet" type="text/css" href="<?php echo e(url('/')); ?>/css/index.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="layui-layout layui-layout-admin">
  <div class="layui-header">
    <div class="layui-logo">大博士 后台</div>
    <!-- 头部区域（可配合layui已有的水平导航） -->
    <ul class="layui-nav layui-layout-left">
      <li class="layui-nav-item list"><a href="#">轮播图</a></li>
      <li class="layui-nav-item list"><a href="#">文章列表</a></li>
      <li class="layui-nav-item list"><a href="#">客服</a></li>
      <li class="layui-nav-item list"><a href="#">推荐好友</a></li>
      <li class="layui-nav-item list"><a href="#">推荐好友</a></li>
      <li class="layui-nav-item list"><a href="http://www.wemart.cn/console/login.html">商城后台</a></li>
      <li class="layui-nav-item">
        <a href="javascript:;">其它系统</a>
        <dl class="layui-nav-child">
          <dd><a href="">邮件管理</a></dd>
          <dd><a href="">消息管理</a></dd>
          <dd><a href="">授权管理</a></dd>
        </dl>
      </li>
      <li class="layui-nav-item list"><a href="#">用户余额</a></li>
    </ul>
    <ul class="layui-nav layui-layout-right">
      <li class="layui-nav-item">
        <a href="javascript:;">
          <img src="http://t.cn/RCzsdCq" class="layui-nav-img">
          大博士
        </a>
        <dl class="layui-nav-child">
          <dd><a href="">基本资料</a></dd>
          <dd><a href="">安全设置</a></dd>
        </dl>
      </li>
      <li class="layui-nav-item"><a href="">退出</a></li>
    </ul>
  </div>
  
  <div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
      <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
      <ul class="layui-nav layui-nav-tree"  lay-filter="test">
        <!-- <li class="layui-nav-item layui-nav-itemed">
          <a class="" href="javascript:;">所有商品</a>
          <dl class="layui-nav-child">
            <dd><a href="javascript:;">列表一</a></dd>
            <dd><a href="javascript:;">列表二</a></dd>
            <dd><a href="javascript:;">列表三</a></dd>
            <dd><a href="">超链接</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item">
          <a href="javascript:;">解决方案</a>
          <dl class="layui-nav-child">
            <dd><a href="javascript:;">列表一</a></dd>
            <dd><a href="javascript:;">列表二</a></dd>
            <dd><a href="">超链接</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item"><a href="">云市场</a></li>
        <li class="layui-nav-item"><a href="">发布商品</a></li> -->
      </ul>
    </div>
  </div>
  
  <div class="layui-body">
    <!-- 内容主体区域 -->
    <div style="padding: 15px;">
    	<!-- <h1>后台首页</h1>
		<ul class="htcon">
			
			<li><a href="<?php echo e(URL::to('admin/tool/lunboto')); ?>">轮播图</a></li>
			<li><a href="<?php echo e(URL::to('adarticle/articlelist')); ?>">文章列表</a></li>
			<li><a href="http://www.zhizhaow.com/index.php/admin/logoin/index">客服</a></li>
			<li><a href="#">推荐好友</a></li>
			<li><a href="#">会员管理</a></li>
			<li><a href="http://www.wemart.cn/console/login.html">商城后台</a></li>
		</ul>
		<p>①客服聊天后台登录时请直接输入客服名称，演示账号为：zhangboshi</p>	
		<p>②商城管理后台的登录账号为：13206499132    密码：admin123</p> -->
		<iframe src="<?php echo e(URL::to('admin/tool/lunboto')); ?>" style="width:100%" id="iframepage" scrolling="no" onload="iframeLoad()" frameborder="0"></iframe>
    </div>
  </div>
  
  <div class="layui-footer">
    <!-- 底部固定区域 -->
   大博士是管理后台
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scrip'); ?>

<script type="text/javascript" src="<?php echo e(url('/')); ?>/js/jq.js"> </script>  
<script type="text/javascript" src="<?php echo e(url('/')); ?>/js/layui.js"> </script> 
 <script type="text/javascript">
 	layui.use('element', function(){
	  var element = layui.element;
	  
	});

  
	//iframe的高度自适应
	var ifm= document.getElementById("iframepage"); 
	
	function iframeLoad(){
	  
	   ifm.height=ifm.contentWindow.document.body.scrollHeight;
	}
	window.onresize=function(){  
	     changeFrameHeight();  
	} 
	$('.list').click(function(){
		var i=$('.list').index(this);
		
		if(i==0){
			 ifm.src="<?php echo e(URL::to('admin/tool/lunboto')); ?>";
		}
		if(i==1){
			ifm.src="<?php echo e(URL::to('adarticle/articlelist')); ?>";
		}
		if(i==2){
			ifm.src="http://www.zhizhaow.com/index.php/admin/logoin/index";
		}
		if(i==3){
			ifm.src="javascript:void(0);";
		}
		if(i==4){
			ifm.src="javascript:void(0);";
		}
    if(i==6){
      ifm.src="<?php echo e(URL::to('admin/tool/wallet')); ?>";
    } 
		
	})
 </script>  
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>