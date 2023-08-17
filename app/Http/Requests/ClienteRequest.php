<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ClienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|max:80|min:5', 
            'email' => 'required|email|unique:usuarios,email,'.$this->input('email'),
            'telefone' => 'required|max:15|min:11',
            'cpf' =>'required|max:11|min:11|unique:usuarios,cpf,'.$this->input('cpf'), 
            'password' => 'required'
        ];
    }

    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => $validator->errors()
        ]));

    }

        public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório',
            'nome,max' => 'O campo nome deve conter no máximo 80 caracteres',
            'nome,min' => 'O campo nome deve conter no mínimo 5 caracteres',
            'email.required' => 'E-mail obrigatório',
            'email.email' => 'Formato de e-mail inválido',
            'email.unique' => 'E-mail já cadastrado no sistema',
            'telefone.required' => 'Telefone obrigatório',
            'telefone.max' => 'Telefone deve conter no máximo 15 caracteres',
            'telefone.min' => 'Telefone deve conter no mínimo 15 caracteres',
            'cpf.required' => 'CPF obrigatório',
            'cpf.max' => 'CPF deve conter no máximo 11 caracteres',
            'cpf.min' => 'CPF deve conter no mínimo 11 caracteres',
            'cpf.unique' => 'CPF já cadastrado no sistema',
            'password.required' => 'Senha obrigatória'
        ];
}

}