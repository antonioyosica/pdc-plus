<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Agente;
use App\Models\Ligacao;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class AgenteController extends Controller
{
    public function registar(Request $request)
    {
        if (!empty($request->all())) {
            $validar = Validator::make($request->all(), [
                'email' => 'required|email|unique:agente,email',
                'username' => 'required|unique:agente,username',
                'password' => 'required|same:password2',
                'cidade' => 'required',
            ], [
                'required' => 'Todos os campos são de preenchimento obrigatório.*Campos em branco!',
                'email.email' => 'Por favor, verifique o e-mail e tente novamente.*E-mail inválido!',
                'email.unique' => 'E-mail informado já foi registado.*E-mail já utilizado!',
                'username.unique' => 'Nome de utilizador informado já foi registado.*Nome de utilizador já utilizado!',
                'password.same' => 'Palavra-passe e confirmação da palavra-passe são diferentes.*Palavra-passes não combinam!'
            ]);

            if ($validar->fails()) {
                return response()->json([
                    'code' => 400,
                    'msg' => $validar->errors()
                ], 200);
            }
            if (!filter_var($request->input('email'), FILTER_VALIDATE_EMAIL)) {
                return response()->json([
                    'code' => 400,
                    'msg' => 'Por favor, verifique o e-mail e tente novamente.*E-mail inválido!'
                ], 200);
            }
            if ($request->input('cidade') == 0) {
                return response()->json([
                    'code' => 400,
                    'msg' => 'Selecciona a localização para criar a conta.*Campo localização vazio!'
                ], 200);
            }

            $agente = new Agente();
            $agente->username = $request->input('username');
            $agente->email = $request->input('email');
            $agente->password = Hash::make($request->input('password'));
            $agente->cidade_id = $request->input('cidade');
            $agente->save();
            return response()->json([
                'code' => 200,
                'msg' => 'Entre na sua conta para partilhar e conectar-se com as pessoas em sua vida.*Conta criada com sucesso!'
            ], 200);
        }
    }

    public function definirTipo(Request $request)
    {
        if (!empty($request->all())) {
            $validar = Validator::make($request->all(), [
                'nome' => 'required|min:6',
                'data_nascimento' => 'required'
            ], [
                'required' => 'Todos os campos com asterisco são de preenchimento obrigatório.*Campos em branco!',
                'nome.min' => 'Por favor, verifique o nome informou e tente novamente.*Nome completo demasiado curto!',
                'data_nascimento.required' => 'Por favor, verifique o campo <b>Data de nascimento</b>, é obrigatório.*Data de nascimento não informada!'
            ]);

            if ($validar->fails()) {
                return response()->json([
                    'code' => 400,
                    'msg' => $validar->errors()
                ], 200);
            }
            if ($request->input('tipo') != 'Individual' && $request->input('tipo') != 'Organizacional') {
                return response()->json([
                    'code' => 401,
                    'msg' => 'Selecciona o tipo de conta.*Campo tipo vazio!'
                ], 200);
            }
            if ($request->input('permissao') == 0) {
                return response()->json([
                    'code' => 401,
                    'msg' => 'Selecciona a permissão da presente conta.*Campo permissão vazio!'
                ], 200);
            }

            DB::table('agente')->where('id', $request->id)->update([
                'nome_completo' => $request->nome,
                'genero' => $request->genero,
                'data_nascimento' => $request->data_nascimento,
                'tipo' => $request->tipo,
                'permissao_id' => $request->permissao
            ]);
            return response()->json([
                'code' => 200,
                'msg' => 'Partilha e conecta-se com as pessoas em sua vida.*Definições da conta actualizada!'
            ], 200);
        }
    }

    public function publicacao(){
        return response()->json([
            'publicacao' => DB::select(DB::raw("SELECT p.id, p.conteudo,p.estado, p.data_criacao, a.nome_completo, a.username, a.foto_perfil, p.permissao_id FROM agente a, publicacao p WHERE a.id=p.agente_id ORDER BY p.id DESC"))
        ], 200)->header('Content-Type', 'application/json');
    }

    public function sugestaoCidade(Request $request)
    {
        if (!empty($request->all())) {
            $user_id = Crypt::decrypt($request->uToken);
            $cidade_id = Crypt::decrypt($request->cToken);

            return response()->json([
                'agente' => DB::select(DB::raw("SELECT a.id, a.nome_completo, a.username, a.foto_perfil, a.tipo FROM agente a WHERE a.id<>$user_id AND a.cidade_id=$cidade_id AND a.estado=1 AND (a.id NOT IN (SELECT agente_origem FROM ligacao WHERE agente_destino=$user_id) AND a.id NOT IN (SELECT agente_destino FROM ligacao WHERE agente_origem=$user_id))"))
            ], 200)->header('Content-Type', 'application/json');
        }

        return response()->json([
            'code' => 401
        ], 200)->header('Content-Type', 'application/json');
    }

    public function pedirLigacao(Request $request)
    {
        if (!empty($request->all())) {
            $ligacao = new Ligacao();
            $ligacao->agente_origem = $request->agente_origem;
            $ligacao->agente_destino = $request->agente_destino;
            if($request->tipo == 'Organizacional'){
                $ligacao->estado = 1;
            }
            $ligacao->save();

            return response()->json([
                'code' => 200
            ], 200)->header('Content-Type', 'application/json');
        }

        return response()->json([
            'code' => 401
        ], 200)->header('Content-Type', 'application/json');
    }

    public function pedidoLigacao(Request $request)
    {
        if (!empty($request->all())) {
            $user_id = Crypt::decrypt($request->token);

            return response()->json([
                'agente' => DB::select(DB::raw("SELECT id, nome_completo, username, foto_perfil, tipo FROM agente WHERE id<>$user_id AND id IN (SELECT agente_origem FROM ligacao WHERE estado=0)"))
            ], 200)->header('Content-Type', 'application/json');
        }

        return response()->json([
            'code' => 401
        ], 200)->header('Content-Type', 'application/json');
    }

}
