<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('inc.navbar')

        <main class="py-4">
            <div class="container mt-2">
                @include('inc.messages')
                @yield('content')
            </div>
        </main>
    </div>

   <script src="{{ URL::to('src/js/jquery-3.3.1.min.js')}}"></script>
     {{-- <script src="{{ URL::to('src/js/popper.min.js')}}"></script>
    <script src="{{ URL::to('src/js/bootstrap.min.js')}}"></script> --}} {{--bootstrap.js already compiled to 'app.js' and loaded in the header, loading it here affects working--}}
    
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
   </script>
</body>
</html>
