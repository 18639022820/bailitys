@extends('layouts.app')
@section('title')
  首页
@endsection
@section('link')
@endsection
@section("content")
   
<input type="file" name="base64">
<button class="asyupload">异步上传</button>
@endsection 

@section('scrip')

<script type="text/javascript">
  $(function(){
     $('.asyupload').click(function(){
        var file = $('input[name=base64]')[0];
        var reader = new FileReader();
            reader.readAsDataURL(file.files[0]);
        reader.onload = function ( event ) { 
          var baase64 = event.target.result;
          $.ajax({ 
                  type : "post",  
                  url : "{{URL::to('discuz/savepic')}}",  
                  data : {data:baase64},  
                  dataType : "json",  
                  success : function(src){
                    console.dir(src);
                  }  
             });
        }; 
     })   
  })
 
</script>
@endsection

@section("footer")
@endsection 