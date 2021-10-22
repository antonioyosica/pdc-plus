<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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

    public function publicacao(){
        return response()->json([
            'publicacao' => DB::select(DB::raw("SELECT p.id, p.conteudo,p.estado, p.data_criacao, a.nome_completo, a.username, a.foto_perfil, p.permissao_id FROM agente a, publicacao p WHERE a.id=p.agente_id ORDER BY p.id DESC"))
        ], 200)->header('Content-Type', 'application/json');
    }
}
