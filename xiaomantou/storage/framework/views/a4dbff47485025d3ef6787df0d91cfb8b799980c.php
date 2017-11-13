<?php $__env->startSection('title'); ?>首页<?php $__env->stopSection(); ?>

<?php $__env->startSection('link'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(url('/css/login.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="headertit">
	<img style="display:block;width:100px;height:100px;margin:30px auto;" src="<?php echo e(url('/data/image/LOGO.png')); ?>" alt="">
	<h1>大博士管理后台</h1>
</div>

<div class="conlogin">
	<form action=""  method="post">
	 	<span class="lab">用户名：</span>
	 	<input type="text" name="username"></br>
	 	<span class="lab">密码:</span>
	 	<input type="password" name="password"> </br>	
	   <button>登录</button>
	</form>
</div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('scrip'); ?>
 <script type="text/javascript">

 </script>  
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>