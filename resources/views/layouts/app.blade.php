<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('style')
</head>

<body>
    @if (session()->has('success'))
        <div>{{ session('success') }}</div>
    @endif
    @yield('content')

</body>

</html>
