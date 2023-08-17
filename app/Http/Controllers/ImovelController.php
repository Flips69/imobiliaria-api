<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImovelRequest;
use App\Models\ImovelModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ImovelController extends Controller
{
    public function imovel(ImovelRequest $request){
        $imovel = ImovelModel::create([
            'tipos' => $request->tipos,
            'endereço' => $request->endereço,
            'valor' => $request->telefone,
            'cpf' => $request->cpf,
        ]);

        return response()->json([
            "sucess" => true,
            "message" => "Cliente Cadastrado com sucesso",
            "data" => $imovel
        ], 200);
    }
}
