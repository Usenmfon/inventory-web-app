<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>App Master</title>
</head>
<body>
    @include('layouts.partials.navbar')
    <main class="h-screen flex justify-center items-center">
        @yield('content')
    </main>
</body>
</html>
