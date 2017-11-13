@extends('layouts.admin')
@section('title')编辑轮播图@endsection

@section('link')
<link rel="stylesheet" type="text/css" href="">
@endsection

@section('content')
<form class="form_action">
	

 <input type="hidden" name="id" value="{{$findlunbo->id}}">	
  轮播图描述
  <input type="text" name="discri" value="{{$findlunbo->discri}}">
   图片
   <img class="imglunbo" src="{{url('/')}}/{{$findlunbo->valueforimg}}">
  
 <input type="hidden" class="lunbovalue" name="value" value="{{$findlunbo->value}}">

 <input type="text" name="type"  value="{{$findlunbo->type}}"> 
</form>
<button class="savechange">保存</button>
@endsection

@section('scrip')
 <script type="text/javascript">
 $(function(){
 	$('.imglunbo').click(function(){
 		var imgurl = "{{url('/')}}/";
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
                    $.post("{{URL::to('admin/tool/upimg')}}",{data:e.target.result},function(res){
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
 			url: "{{URL::to('admin/tool/lunbotusane')}}",
 			type: 'POST',
 			dataType: 'json',
 			data:serializ,
 		})
 		.done(function(src) {
 			if(src=="1"){
 				location.href= "{{URL::to('admin/tool/lunboto')}}";
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
@endsection

@section('footer')
    
@endsection