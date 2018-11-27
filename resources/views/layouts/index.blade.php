<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>@yield('page-title')</title>
        <link href="{{ url('css/app.css')}}"  rel="stylesheet" >
        @yield('section-css')
    </head>
    <body>
        @yield('content')
            <script src="{{url('js/moment.min.js')}}" ></script>
            <script src="{{ url('js/app.js')}}" ></script>
        @yield('section-js')
    </body>
</html>