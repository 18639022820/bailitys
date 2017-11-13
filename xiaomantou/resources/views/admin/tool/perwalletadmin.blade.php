@extends('layouts.admin')
@section('title')钱包@endsection

@section('link')
<link rel="stylesheet" type="text/css" href="{{url('/css/lunbo.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('/css/layui.css')}}">
@endsection

	@section('content')
	<form class="layui-form" style="width:300px;margin:auto;text-align:left;" action="{{URL::to('admin/tool/savepersonwallbyadmin')}}" method="post">		
		<div class="layui-form-item">
			<input type="hidden" name="uid" value="{{ $userinfo->id }}">
			{{ $userinfo->id}}
		</div>
		<div class="layui-form-item">
			 
			 	<span>用户名</span>
			 
			{{ $userinfo->username}}
		</div>
		<div class="layui-form-item">
			<span>用户电话</span>
			{{ $userinfo->tele}}
		</div>
		<div class="layui-form-item">
			<span>钱</span>
			<input type="text" name="money" value="{{ $userinfo->money==null ? 0: $userinfo->money}}">元
		</div>
		<div class="layui-form-item">
			<span>时间</span>
			{{ $userinfo->time}}
		</div>
		<div class="layui-form-item">
			<button class="layui-btn">充值</button>
		</div>
	</form>
	@endsection

@section('scrip')
 <script type="text/javascript">

 </script>  
@endsection

@section('footer')
    
@endsection
	
