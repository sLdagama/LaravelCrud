@extends('layouts.defaultlogin')

@section('content')
    @error('error')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Erro!</strong> {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @enderror
    <main class="p-8">  
        <div class="bg-white shadow-lg rounded-lg p-6 max-w-lg mx-auto mgt-15">
            <h2 class="text-xl font-semibold mb-6">Login - sLdagama</h2>
            <form action="{{ route('login.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input required="" type="email" id="email" name="email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Insira o seu email">
                </div>
                @error('email')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
                <div>  
                    <label for="senha" class="block text-sm font-medium text-gray-700">Senha</label>
                    <input required="" type="password" id="senha" name="senha" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Insira a sua senha">
                </div>
                @error('senha')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror   
                <div class="pt-4">
                    <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">
                        Entrar
                    </button>
                </div>
            </form>
        </div>
    </main>
@endsection
