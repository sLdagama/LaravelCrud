@extends('layouts.default')

@section('content')
    @if ($errors->has('cep'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Erro!</strong>
            <span class="block sm:inline">{{ $errors->first('cep') }}</span>
        </div>
    @endif
    <main class="p-8">
        <div class="bg-white shadow-lg rounded-lg p-6 max-w-lg mx-auto mgt-15">
            <h2 class="text-xl font-semibold mb-6">Adicionar Usuário</h2>
            <form action="{{ route('users.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
                    <input required="" type="text" id="name" name="name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Nome completo">
                </div>

                <div>
                    <label for="cep" class="block text-sm font-medium text-gray-700">CEP</label>
                    <input required="" type="text" id="cep" name="cep" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="XXXXX-XXX">
                </div>
                
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">Telefone</label>
                    <input required="" type="text" id="phone" name="phone" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="(XX) XXXXX-XXXX">
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">
                        Adicionar
                    </button>
                </div>
            </form>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
    <script>
        $('#phone').mask('(00) 00000-0000');
        $('#cep').mask('00000-000');
    </script>
@endsection