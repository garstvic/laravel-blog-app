<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ URL::secure('src/css/main.css') }}" type="text/css" />
    @yield('styles')
</head>
<body>
    @include('includes.header')
        <div class="main">
            @yield('content')
        </div>
    @include('includes.footer')
</body>
</html>