<?php $__env->startSection('title'); ?>钱包<?php $__env->stopSection(); ?>

<?php $__env->startSection('link'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(url('/css/lunbo.css')); ?>">
<?php $__env->stopSection(); ?>

	<?php $__env->startSection('content'); ?>
	<form action="<?php echo e(URL::to('admin/tool/savepersonwallbyadmin')); ?>" method="post">		
		<input type="hidden" name="uid" value="<?php echo e($userinfo->id); ?>">
		<?php echo e($userinfo->id); ?>

		<br/>
		<span>用户名</span>
		<?php echo e($userinfo->username); ?>

		<br/>
		<span>用户电话</span>
		<?php echo e($userinfo->tele); ?>

		<br/>
		<span>钱</span>
			<input type="text" name="money" value="<?php echo e($userinfo->money==null ? 0: $userinfo->money); ?>">元
		<br/>
		<span>时间</span>
		<?php echo e($userinfo->time); ?>

		<button>保存</button>

	</form>
	<?php $__env->stopSection(); ?>

<?php $__env->startSection('scrip'); ?>
 <script type="text/javascript">

 </script>  
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    
<?php $__env->stopSection(); ?>
	

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>