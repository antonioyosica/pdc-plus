<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publicacao;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PublicacaoController extends Controller
{
    public function registarTextual(Request $request)
    {
        if (!empty($request->all())) {
            $validar = Validator::make($request->all(), [
                'conteudo' => 'required'
            ], [
                'required' => 'Preencha o campo para publicar o que está em sua mente.*Campo vazio!',
            ]);

            if ($validar->fails()) {
                return response()->json([
                    'code' => 400,
                    'msg' => $validar->errors()
                ], 200);
            }

            $publicacao = new Publicacao();
            $publicacao->conteudo = $request->conteudo;
            $publicacao->agente_id = $request->id;
            $publicacao->permissao_id = $request->permissao;
            $publicacao->save();
            return response()->json([
                'code' => 200,
                'msg' => '...*Publicação partilhada com sucesso!'
            ], 200);
        }
    }
}
