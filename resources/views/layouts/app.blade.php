<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" href="favicon.ico" type="image/x-icon" />

</head>
<body>

    @include('inc.navbar')
    <div id="app">
        @yield('content')
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('stripe')
    @include('inc.footer')
    @if(!Auth::check())
        <div class="sticky" style="position: fixed; top: 93%; right:1%; padding: 5px;
                background-color: #6CBD45;
                font-size:18px;
                font-weight:900;
                padding:5px;
                border: 2px solid #4CAF50;"><a href="{{ route('register') }}" style="color:white">Join Georgia-APPNA</a></div>  
        <!-- Scripts -->
    @endif
    
</body>
</html>
