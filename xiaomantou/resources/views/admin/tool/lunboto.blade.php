@extends('layouts.admin')
@section('title')轮播图列表@endsection

@section('link')
<link rel="stylesheet" type="text/css" href="{{url('/css/lunbo.css')}}">
@endsection

@section('content')
	 @foreach ($lunbolist as $key => $value)
	 <div class="eachlb">
		<div class="gh">
			<span>第{{$key+1}}张</span><a style="float:right" href="{{URL::to('admin/tool/editlunboto')}}?id={{ $value['id'] }}">更换</a>	
		</div>
	 	<img class="lbimg" src="{{url('/')}}/{{ $value['value']}}">
	 		<!-- {{ $value['name']   }}
	 		{{ $value['discri'] }} -->
	 	
	 </div>
	 		
	 	
	 @endforeach

@endsection

@section('scrip')
 <script type="text/javascript">

 </script>  
@endsection

@section('footer')
    
@endsection