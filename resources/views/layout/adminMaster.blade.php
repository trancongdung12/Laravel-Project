<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
     <link rel="stylesheet" href="{{asset('css/admin/admin.css')}}">
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    <title>@yield('title')</title>
</head>
    @include('partials.admin')
    @yield('content')
    <script src="{{mix('js/app.js')}}"></script>
    @include('partials.load')
</html>
