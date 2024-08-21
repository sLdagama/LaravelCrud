<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sldagama</title>
    @vite('resources/css/app.css')
    @vite('resources/css/tailwind.css')
</head>
<body class="flex flex-col min-h-screen">
    <header class="bg-gray-800 text-white p-6 flex justify-between items-center">
        <div class="text-2xl font-bold">
            <a href="{{ route('home') }}">sLdagama</a>
        </div>
        <a href="{{ route('users.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Adicionar Usuário
        </a>
    </header>
    <main class="flex-grow">
        @yield('content')
    </main>
    <footer class="bg-gray-800 text-white text-center p-4">
        &copy; 2024 direitos reservados para sLdagama
    </footer>
    @vite('resources/js/app.js')
</body>
</html>
