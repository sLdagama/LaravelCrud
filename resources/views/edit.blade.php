@extends('layouts.default')

@section('content')
    <main class="p-8">
        <div class="bg-white shadow-lg rounded-lg p-6 max-w-lg mx-auto mgt-15">
            <h2 class="text-xl font-semibold mb-6">Editar Usuário</h2>
            <form enctype="multipart/form-data" action="{{ route('users.update', $user->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
                    <input value="{{ $user->name }}" required="" type="text" id="name" name="name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Nome completo">
                </div>
                
                <div>
                    <label for="cep" class="block text-sm font-medium text-gray-700">CEP</label>
                    <input value="{{ $user->cep }}" type="text" id="cep" name="cep" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="XXXXX-XXX">
                </div>

                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">Telefone</label>
                    <input value="{{ $user->phone }}" required="" type="text" id="phone" name="phone" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="(XX) XXXXX-XXXX">
                </div>
                <div>
                    <label for="user_file" class="block text-sm font-medium text-gray-700">Foto</label>
                    <input type="file" id="user_file" name="user_file" class="hidden">
                    <label for="user_file" class="cursor-pointer mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 bg-white text-gray-500 text-center hover:bg-gray-100 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        Selecione uma imagem
                    </label>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">
                        Editar
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