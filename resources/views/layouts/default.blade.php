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
        <!-- Dropdown de Usuário -->
        @if (Auth::check())
            <div class="relative">
                <button id="userMenuButton" class="flex items-center space-x-2 focus:outline-none">
                    <img src="{{ asset('storage/' . Auth::user()->user_file) }}" alt="User Avatar" class="h-10 w-10 rounded-full">
                    <span class="text-sm font-semibold">{{ Auth::user()->name }}</span>
                    <!-- Ícone de seta para baixo -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <!-- Dropdown Menu -->
                <div id="userMenu" class="absolute right-0 mt-2 w-48 bg-white text-gray-700 shadow-lg rounded-lg hidden">
                    <div class="py-2">
                        <a href="{{ route('login.logout') }}" class="block px-4 py-2 text-sm hover:bg-gray-100">Logout</a>
                    </div>
                </div>
            </div>
        @endif
    </header>
    <main class="flex-grow">
        @yield('content')
    </main>
    <footer class="bg-gray-800 text-white text-center p-4">
        &copy; 2024 direitos reservados para sLdagama
    </footer>
    @vite('resources/js/app.js')

    <script>
        // Script para alternar a visibilidade do menu suspenso
        document.getElementById('userMenuButton').addEventListener('click', function() {
            var menu = document.getElementById('userMenu');
            menu.classList.toggle('hidden');
        });

        // Fechar o menu se clicar fora dele
        document.addEventListener('click', function(event) {
            var isClickInside = document.getElementById('userMenu').contains(event.target) ||
                                document.getElementById('userMenuButton').contains(event.target);
            if (!isClickInside) {
                document.getElementById('userMenu').classList.add('hidden');
            }
        });
    </script>
</body>
</html>
