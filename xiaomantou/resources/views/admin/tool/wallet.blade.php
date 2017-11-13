@extends('layouts.admin')
@section('title')钱包@endsection
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('link')
<link rel="stylesheet" type="text/css" href="{{url('/css/lunbo.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('/css/layui.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('/')}}/css/modules/layer/default/layer.css">

@endsection

	@section('content')
		
		<div class="container">
			<div class="layui-form">
			<table class="layui-table" lay-size="sm">
			 
		    <thead>
		      <tr>
		        <th>用户名</th>
		        <th>电话</th>
		        <th>金额</th>
		        <th>奖金</th>
		        <th>时间</th>
		        <th>操作</th>
		      </tr> 
		    </thead>
		    <tbody>
			    @foreach ($list as $v)
			    	<tr>
			        	<td>{{ $v->username }}</td>
				        <td>{{ $v->tele }}</td>
				        <td><span  style="color:red">{{ isset($v->money)?$v->money:0 }}</span>元</td>
				        <td>{{ isset($v->bonus)?$v->bonus:0 }}元</td>
				        <td>@if(!@empty ($v->time))
				       	 {{ date('Y-m-d H:i:s',$v->time) }}
				        @endif</td>
				        <td>
				        <!-- <a class="layui-btn layui-btn-mini" href="{{URL::to('admin/tool/perwalletadmin')}}/{{$v->id}}.html"><span>编辑</span></a> -->
							<button data-method="offset" data-type="auto" class="layui-btn layui-btn-mini btn" data-id="{{$v->id}}">编辑</button>
				        	<button data-method="offset" data-type="auto" class="layui-btn layui-btn-mini btn1" data-id="{{$v->id}}">查看</button>
				        </td>
				   </tr>   	
			    @endforeach
			     </tbody>
  				</table>
		    </div>
		</div>

	{{ $list->links() }}

	@endsection

@section('scrip')
<script type="text/javascript" src="{{url('/')}}/js/jq.js"> </script>  
<script type="text/javascript" src="{{url('/')}}/js/lay/modules/layer.js"> </script> 
<script type="text/javascript">
	 
	$('.btn').click(function(){
		// alert($(this).attr("data-id"));
		layer.open({
		  type: 2, 
		   title: ['编辑', 'font-size:18px;'],
		  content: "{{URL::to('admin/tool/perwalletadmin')}}/"+$(this).attr("data-id")+".html" ,//这里content是一个URL，如果你不想让iframe出现滚动条，你还可以content: ['http://sentsin.com', 'no']
			shadeClose :true,
			area: ['500px', '300px']

		}); 
		

	})

	$('.btn1').click(function(){
		// alert(0);
		var uid=$(this).attr("data-id");
		 $.ajax({
			url:"{{URL::to('look')}}",
		 	type : "post",
		 	data:{uid:uid},
		 	
		 	success:function(result){
	         	if(result==1){
	         		layer.open({
					  type: 1, 
					  title: ['已邀请用户', 'font-size:18px;'],
					  content: '<div style="margin-top:100px;text-align:center;">没有邀请用户</div>',
					  area: ['500px', '300px'] 
					});
	         	}else{
	         		var data=JSON.parse(result);
		         	var str="";
		         	for(var i=0;i<data.length;i++){
		         		console.log(data[i].username);
		         		str+=data[i].username+'</br>';
		         	}

		         	layer.open({
					  type: 1, 
					  title: ['已邀请用户', 'font-size:18px;'],
					  content:'<div style="margin-top:100px;text-align:center;">'+str+'</div>',
					  area: ['500px', '300px'] 
					});
	         	}
	         	
		     },
		 });
	})
	
</script> 
@endsection

@section('footer')
    
@endsection