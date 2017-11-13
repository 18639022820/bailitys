<html >
<meta name="csrf-token" content="{{ csrf_token() }}">
    <head>
        <title>@yield('title')</title>
               @yield('link')
          <script src="{{ URL::asset('js/jq.js')}}"></script> 
     
        <!-- <script src="{{ URL::asset('comm/static/js/ag.js')}}"></script>   -->
    </head>
    <body >
        <div class="container">
             @section('content')

             @show
        </div>
        @yield('scrip')
        
        @section('footer') 
                        
        @show

    </body>
</html>