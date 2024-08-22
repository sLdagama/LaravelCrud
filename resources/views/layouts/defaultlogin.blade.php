<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>sLdagama</title>
    @vite('resources/css/app.css')
    @vite('resources/css/tailwind.css')
</head>
<body>
    @yield('content')

    @vite('resources/js/app.js')
</body>
</html>