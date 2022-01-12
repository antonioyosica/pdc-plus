<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Models\Permissao;
use App\Models\Publicacao;

class InicioController extends Controller
{
    public function inicio()
    {
        $conteudo = [
            'titulo' => 'Início &minus; PDC.Plus',
            'agente' => Auth::user(),
            'permissoes' => Permissao::get()
        ];

        return view('pages/inicio', $conteudo);
    }

    public function publicacaoFeed(Request $request){
        $user_id = Crypt::decrypt($request->token);

        return response()->json([
            'publicacao' => DB::select(DB::raw("(SELECT p.id, p.conteudo, p.estado, p.data_criacao, a.nome_completo, a.username, a.foto_perfil, p.permissao_id FROM agente a, publicacao p WHERE a.id=p.agente_id AND p.permissao_id=4 ORDER BY p.id DESC) UNION (SELECT p.id, p.conteudo, p.estado, p.data_criacao, a.nome_completo, a.username, a.foto_perfil, p.permissao_id FROM agente a, publicacao p, ligacao l WHERE a.id=p.agente_id AND  p.permissao_id=2 AND (p.agente_id IN (SELECT agente_origem FROM ligacao WHERE agente_destino=$user_id) OR p.agente_id IN (SELECT agente_destino FROM ligacao WHERE agente_origem=$user_id)) ORDER BY p.id DESC)"))
        ], 200)->header('Content-Type', 'application/json');
    }
}
