@extends('layouts.default')

@section('content')

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sucesso!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('login.success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sucesso!</strong> {{ session('login.success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    
    <div class="flex justify-center my-6">
        <form action="/" method="GET" class="flex items-center space-x-2">
            <input value="{{ request()->search }}" name="search" id="search" type="text" placeholder="Buscar..." class="px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">
                Buscar
            </button>
        </form>
    </div>

    <main class="p-8">
        <div class="bg-white shadow-lg rounded-lg p-6 relative">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-semibold">Lista de Usuários</h2>
                <a href="{{ route('users.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
                    Adicionar Usuário
                </a>
            </div>

            @foreach ($users as $user)
                @php
                    $cep_true = preg_replace('/[^0-9]/', '', $user->cep); // Remove todos os caracteres que não forem números
                    $url = "https://viacep.com.br/ws/$cep_true/json/"; // URL da API
                    $json = file_get_contents($url); // Recebe o JSON
                    $endereco = json_decode($json); // Decodifica o JSON
                @endphp
                
                <ul>
                    <li class="border-b border-gray-200 py-2">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <img class="h-10 w-10 rounded-full" src="{{ asset('storage/' . $user->user_file) }}" alt="Usuário">
                                </div>
                                <div class="ml-4">
                                    <div class="text-lg font-medium text-gray-900">Nome : {{ $user->name }}</div>
                                    <div class="text-sm text-gray-500">Endereço : {{ $endereco->bairro . ' - ' . $endereco->logradouro . ' (' . $endereco->localidade . ') ' }}</div>
                                    <div class="text-sm text-gray-500">Telefone : {{ $user->phone }}</div>
                                </div>
                            </div>
                            <div class="flex space-x-4">
                                <!-- Ícone de Edição -->
                                <a href="{{ route('users.edit', $user->id) }}" class="text-blue-500 hover:text-blue-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 3a2 2 0 012 2v14a2 2 0 01-2 2H6a2 2 0 01-2-2V5a2 2 0 012-2h10zM5 8l1.5-1.5m11 11L19 13.5m-3.5-3.5L5 16v-1.5L12.5 8.5 17 13z" />
                                    </svg>
                                </a>
                                <!-- Ícone de Exclusão (Lixeira) -->
                                <a href="{{ route('users.destroy', $user->id) }}" class="text-red-500 hover:text-red-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 7h12M9 4h6a1 1 0 01.993.883L16 5h2a1 1 0 01.993.883L19 6v1H5V6a1 1 0 01.883-.993L6 5h2a1 1 0 01.993.883L9 4zM5 10v11a1 1 0 001 1h12a1 1 0 001-1V10H5z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
            @endforeach
            <div class="mt-4">
                {{ $users->links() }}
            </div>
        </div>
    </main>
@endsection
