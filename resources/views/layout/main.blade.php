<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyBlog</title>
    @vite(['resources/sass/app.scss','resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>

<body class="d-flex flex-column min-vh-100">
    @include('layout.navbar')
    <div class="container">
        @yield('content')
    </div>
</body>

    @include('layout.footer')
</html> 