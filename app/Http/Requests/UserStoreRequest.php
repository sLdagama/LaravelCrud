<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Redirect;

class UserStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'cep' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    // Remove todos os caracteres que não forem números
                    $cep_true = preg_replace('/[^0-9]/', '', $value);
                    
                    // URL da API ViaCEP
                    $url = "https://viacep.com.br/ws/$cep_true/json/";

                    // Tenta obter o JSON
                    $json = @file_get_contents($url);
                    
                    // Verifica se o JSON foi obtido com sucesso e se o CEP existe
                    if ($json === FALSE || isset(json_decode($json)->erro)) {
                       $fail('O CEP informado não existe');
                    } 
                }
            ], 
            // o parâmetro $attribute é o nome do campo, nesse caso cep
            // o parâmetro $value é o valor do campo, nesse caso o cep informado pelo usuário
            // o parâmetro $fail é a função que será executada caso o CEP seja inválido


            'phone' => 'required|string',
            'user_file' => 'file|nullable',
            'email'=> 'required|email',
            'senha' => 'required|string',
        ];
    }
}
