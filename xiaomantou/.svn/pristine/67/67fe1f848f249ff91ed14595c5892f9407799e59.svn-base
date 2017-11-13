@extends('layouts.admin')
@section('title')首页@endsection

@section('link')
<link rel="stylesheet" type="text/css" href="{{url('/')}}/css/addartice.css">
@endsection

@section('content')
<a href="{{URL::to('adarticle/articlelist')}}">文章列表</a>
<form action=""  method="post">

 	<h4>标题</h4>
 	<input type="text" name="name">
 	<h4>内容</h4>
 	<input type="text" name="content"> 
 	<h4>跳转全连接</h4>
 	<input type="text" name="httpali"> 
	<input type="hidden" name="simallpic" id='simallpic' value=""> 
	<input type="hidden" name="bigpic" 	  id='bigpic' value=""> 
	<div class="sbimg">
		<h4>simallpic小图</h4>
 		<input type="file" class="filepic" data-file='simallpic' name="si">
	</div>
	<div class="sbimg">
		<h4>bigpic大图</h4>
 		<input type="file" class="filepic" data-file='bigpic' name="se"> 
	</div>
	

 	
   <button>保存</button>
 </form>


@endsection
@section('scrip')
 <script type="text/javascript">
 $(function(){
 	$('.filepic').change(function(){
 		var thispic=$(this);
 		var file = $(this)[0].files[0];
 		var reader = new FileReader();
            reader.readAsDataURL(file);
             reader.onload = function ( event ) { 
	          var baase64 = event.target.result;
	          $.ajax({ 
	                  type : "post",  
	                  url : "{{URL::to('adarticle/savepic')}}",  
	                  data : {data:baase64},  
	                  dataType : "json",  
	                  success : function(src){
	                  	var datafile = thispic.attr('data-file');
	                    $("#"+datafile)[0].value=src.data.name;
	                  }  
	             });
	        };
 		
 	})
 })



 </script>  
@endsection

@section('footer')
    
@endsection