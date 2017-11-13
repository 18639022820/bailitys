
<?php $__env->startSection('title'); ?>轮播图列表<?php $__env->stopSection(); ?>

<?php $__env->startSection('link'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(url('/css/lunbo.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	 <?php $__currentLoopData = $lunbolist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	 <div class="eachlb">
		<div class="gh">
			<span>第<?php echo e($key+1); ?>张</span><a style="float:right" href="<?php echo e(URL::to('admin/tool/editlunboto')); ?>?id=<?php echo e($value['id']); ?>">更换</a>	
		</div>
	 	<img  class="lbimg" src="<?php echo e(url('/')); ?>/<?php echo e($value['value']); ?>">
	 		<!-- <?php echo e($value['name']); ?>

	 		<?php echo e($value['discri']); ?> -->
	 	
	 </div>
	 		
	 	
	 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scrip'); ?>
 <script type="text/javascript">

 </script>  
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>