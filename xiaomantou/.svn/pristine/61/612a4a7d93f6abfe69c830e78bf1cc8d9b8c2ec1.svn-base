@extends('layouts.admin')
@section('title')首页@endsection

@section('link')
<link rel="stylesheet" type="text/css" href="{{url('/')}}/css/articlelist.css">
@endsection

@section('content')
 <a href="{{URL::to('adarticle/addartice')}}">添加文章</a>
<div class="container">
    @foreach ($arlit as $art)
    <div class="eacdiv">
         <div class="lianjie">
            
            <h4>{{ $art->name }}</h4>   
            <p>{{ $art->content }}</p>
            <img src="{{url('/')}}/{{ $art->simallpic }}" width="150px">
            <img src="{{url('/')}}/{{ $art->bigpic }}" width="150px">
        </div>
        <div class="lianjie" style="margin-top:100px;margin-left:30px;">
            <p><a href="{{ $art->httpali }}">链接地址</a></p>
             <p><a href="{{URL::to('adarticle/delearticle')}}?id={{ $art->id }}">删除文章</a></p>
        </div>
        
        </br>
    </div>
        
      
    @endforeach
</div>

{{$arlit->links()}}

@endsection
@section('scrip')
	<!-- <script type="text/javascript">
		$(function(){
			$('.deletarticle').click(function(){
				var selfid = $(this).data('id');

			})
		})

	</script> -->


 </script>  
@endsection

@section('footer')
    
@endsection