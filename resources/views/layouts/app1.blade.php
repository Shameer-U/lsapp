<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        {{-- <title>{{config('app.name', 'LSAPP')}}</title>   --}}
        <title>LSAPP</title> 
        {{-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> --}}

        <!--my custom files -->
         <!--one way of loading files from public folder -->
        <link rel="stylesheet" href="{{asset('src/css/bootstrap.min.css')}}">
        <!--another way of loading files from public folder -->
        <link rel="stylesheet" href="{{ URL::to('src/css/main.css')}}">

        

    </head>
    <body>
        @include('inc.navbar1')
        <div class="container mt-2">
            @include('inc.messages')
            @yield('content')
        </div>
        


        <script src="{{ URL::to('src/js/jquery-3.3.1.min.js')}}"></script>
        <script src="{{ URL::to('src/js/popper.min.js')}}"></script>
        <script src="{{ URL::to('src/js/bootstrap.min.js')}}"></script>
        
        <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace( 'article-ckeditor' );
       </script>
       
    </body>
</html>
