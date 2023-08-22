<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Models\ClienteModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
     public function store(ClienteRequest $request){
        $cliente = ClienteModel::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'cpf' => $request->cpf,
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            "sucess" => true,
            "message" => "Cliente Cadastrado com sucesso",
            "data" => $cliente
        ], 200);
    }
    
    public function pesquisarPorId($id){
        return response()->json([
            "sucess" => true,
            "message" => "Consulta realizada com sucesso",
            "data" => ClienteModel::find($id)
        ]);
    }
}
