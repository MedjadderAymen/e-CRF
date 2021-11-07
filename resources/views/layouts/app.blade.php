<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    @include('layouts.headerScripts')


</head>
<body>

<div id="app">

    <!-- Start Side bar -->
@include('layouts.sideBar')
<!-- End Side bar -->

    <div id="main">
        @yield('content')
    </div>
</div>

@include('layouts.bodyScripts')

@yield('scripts')

</body>
</html>
