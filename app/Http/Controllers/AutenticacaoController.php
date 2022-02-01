<?php

namespace App\Http\Controllers;

Use \Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Agente;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AutenticacaoController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('terminar_sessao');
    }

    public function autenticar(Request $request)
    {
        $validar = Validator::make($request->all(), [
            'login_username' => 'required',
            'login_password' => 'required',
        ], [
            'required' => 'Informe suas credenciais para entrar.*Campos em branco!',
        ]);
        if ($validar->fails()) {
            return response()->json([
                'code' => 400,
                'msg' => $validar->errors()
            ], 200);
        }

        $username = $request->input('login_username');
        if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
            $agente = Agente::where('username', $username)->where('estado', 1)->first();
            if (!empty($agente)) {
                $username = $agente->email;
            } else {
                return response()->json([
                    'code' => 500,
                    'msg' => 'Por favor, verifique-a e tente novamente.*Credencial incorrecta!'
                ], 200);
            }
        }

        $credenciais = [
            'email'  => $username,
            'password' => $request->input('login_password')
        ];
        if (Auth::attempt($credenciais, true)) {
            $agente = Auth::user();
            DB::table('agente_estado')->where('agente_id', $agente->id)->update([
                'estado' => true,
                'data' => Carbon::now('Africa/Luanda')->format('Y-m-d H:i:s')
            ]);
            return response()->json([
                'code' => 200,
                'info' => $agente
            ], 200);
        } else {
            return response()->json([
                'code' => 500,
                'msg' => 'Por favor, verifique-a e tente novamente.*Credencial incorrecta!'
            ], 200);
        }
    }

    public function terminar_sessao()
    {
        DB::table('agente_estado')->where('agente_id', Auth::user()->id)->update([
            'estado' => false,
            'data' => Carbon::now('Africa/Luanda')->format('Y-m-d H:i:s')
        ]);
        Auth::logout();
        return redirect('/');
    }
}
