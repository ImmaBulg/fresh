<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>

@yield('meta')

<!-- <link rel="shortcut icon" href="/img/favicon.png" type="image/x-icon"> -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"></head>

@yield('css')

<body>

@include('site.layouts.another.header')

@yield('content')

@include('site.layouts.another.footer')

<script type="text/javascript" src="{{ asset('js/app.js') }}"></script></body>
<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
@yield('js')

</html>
