<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sldagama</title>
    <script src="https://cdn.tailwindcss.com"></script> 
    
</head>
<body>
    <header class="bg-gray-800 text-white p-6 flex justify-between items-center">
        <div class="text-2xl font-bold">
            <a href="{{ route('home') }}">sLdagama</a>
        </div>
        
        <a href="{{ route('users.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Adicionar Usuário
        </a>
    </header>

    @yield('content')

    <footer class="bg-gray-800 text-white text-center p-4 mt-4">
        &copy; 2024 direitos reservados para sLdagama
    </footer>
    
</body>
</html>