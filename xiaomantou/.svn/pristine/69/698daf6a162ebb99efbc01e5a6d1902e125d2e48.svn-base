<?php $__env->startSection('title'); ?>钱包<?php $__env->stopSection(); ?>

<?php $__env->startSection('link'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(url('/css/lunbo.css')); ?>">
<?php $__env->stopSection(); ?>

	<?php $__env->startSection('content'); ?>
		
		<div class="container">
		    <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		        <?php echo e($v->username); ?>

		        <?php echo e($v->tele); ?>

		        <span  style="color:red"><?php echo e($v->money); ?></span>元
		        <?php echo e($v->wauserinfo); ?>

		        <?php echo e($v->tele); ?>

		        <?php if(!@empty ($v->time)): ?>
		       	 <?php echo e(date('Y-m-d H:i:s',$v->time)); ?>

		        <?php endif; ?>
		        <a href="<?php echo e(URL::to('admin/tool/perwalletadmin')); ?>/<?php echo e($v->id); ?>.html"><span>编辑</span></a>
		       <br/>
		    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>

	<?php echo e($list->links()); ?>


	<?php $__env->stopSection(); ?>

<?php $__env->startSection('scrip'); ?>
 <script type="text/javascript">

 </script>  
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>