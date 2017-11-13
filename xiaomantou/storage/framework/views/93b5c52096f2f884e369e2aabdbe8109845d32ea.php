
<?php $__env->startSection('title'); ?>首页<?php $__env->stopSection(); ?>

<?php $__env->startSection('link'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(url('/')); ?>/css/articlelist.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
 <a href="<?php echo e(URL::to('adarticle/addartice')); ?>">添加文章</a>
<div class="container">
    <?php $__currentLoopData = $arlit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $art): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="eacdiv">
         <div class="lianjie">
            
            <h4><?php echo e($art->name); ?></h4>   
            <p><?php echo e($art->content); ?></p>
            <img src="<?php echo e(url('/')); ?>/<?php echo e($art->simallpic); ?>" width="150px">
            <img src="<?php echo e(url('/')); ?>/<?php echo e($art->bigpic); ?>" width="150px">
        </div>
        <div class="lianjie" style="margin-top:100px;margin-left:30px;">
            <p><a href="<?php echo e($art->httpali); ?>">链接地址</a></p>
             <p><a href="<?php echo e(URL::to('adarticle/delearticle')); ?>?id=<?php echo e($art->id); ?>">删除文章</a></p>
        </div>
        
        </br>
    </div>
        
      
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<?php echo e($arlit->links()); ?>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('scrip'); ?>
	<!-- <script type="text/javascript">
		$(function(){
			$('.deletarticle').click(function(){
				var selfid = $(this).data('id');

			})
		})

	</script> -->


 </script>  
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>