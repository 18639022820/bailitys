
<?php $__env->startSection('title'); ?>编辑轮播图<?php $__env->stopSection(); ?>

<?php $__env->startSection('link'); ?>
<link rel="stylesheet" type="text/css" href="">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<form class="form_action">
	

 <input type="hidden" name="id" value="<?php echo e($findlunbo->id); ?>">	
  轮播图描述
  <input type="text" name="discri" value="<?php echo e($findlunbo->discri); ?>">
   图片
   <img style="min-width:100px;min-height:100px;" class="imglunbo" src="<?php echo e(url('/')); ?>/<?php echo e($findlunbo->valueforimg); ?>">
  
 <input type="hidden" class="lunbovalue" name="value" value="<?php echo e($findlunbo->value); ?>">

 <input type="text" name="type"  value="<?php echo e($findlunbo->type); ?>"> 
</form>
<button class="savechange">保存</button>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scrip'); ?>
 <script type="text/javascript">
 $(function(){
 	$('.imglunbo').click(function(){
 		var imgurl = "<?php echo e(url('/')); ?>/";
 		 var input = document.createElement('input');
			 input.setAttribute('type', 'file');
			 input.setAttribute('class', 'fileimgput'); 
			 document.body.appendChild(input);
			 input.style.display = 'none';
			 input.click();
			 input.onchange = function(){
			 	var reader = new FileReader();
			 	reader.readAsDataURL(input.files[0]);
			 	reader.onload = function(e){
			 		//alert(e.target.result);
                    $.post("<?php echo e(URL::to('admin/tool/upimg')); ?>",{data:e.target.result},function(res){
                        var imglunbo = $('.imglunbo');
                        imglunbo.attr('src',imgurl+res.data.fullpath);
                        
                        $('.lunbovalue').val(res.data.name);
                    })
                } 
			 } 		
 		})
 	
 	$('.savechange').click(function(){
 		var serializ =$('.form_action').serialize();
 		$.ajax({
 			url: "<?php echo e(URL::to('admin/tool/lunbotusane')); ?>",
 			type: 'POST',
 			dataType: 'json',
 			data:serializ,
 		})
 		.done(function(src) {
 			if(src=="1"){
 				location.href= "<?php echo e(URL::to('admin/tool/lunboto')); ?>";
 			}
 		})
 		.fail(function() {
 			console.log("error");
 		})
 		.always(function() {
 			
 		});
 		
 	})
 	
 	

 })

 </script>  
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>