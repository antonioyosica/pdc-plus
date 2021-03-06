<?php

use Illuminate\Support\Facades\Route;
use App\Models\Cidade;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AgenteController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\PublicacaoController;
use App\Http\Controllers\AutenticacaoController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if(Auth::check()){
        return redirect()->route('inicio');
    }else{
        return view('layouts/login', [
            'titulo' => 'PDC.Plus',
            'cidades' => Cidade::get()
        ]);
    }
})->name('home');
Route::post('/entrar', [AutenticacaoController::class, 'autenticar'])->name('entrar');
Route::post('/agente/criar', [AgenteController::class, 'registar'])->name('criar_agente');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/sair', [AutenticacaoController::class, 'terminar_sessao'])->name('sair');
    Route::get('/inicio', [InicioController::class, 'inicio'])->name('inicio');

    Route::get('/publicacao', [InicioController::class, 'publicacaoFeed'])->name('publicacao');
    Route::post('/publicacao/criar', [PublicacaoController::class, 'registarTextual'])->name('textual');
    Route::get('/publicacao/agente', [AgenteController::class, 'publicacao'])->name('publicacao2');

    Route::get('/agente/sugestao', [AgenteController::class, 'sugestaoCidade'])->name('sugestao');
    Route::post('/agente/definir/tipo', [AgenteController::class, 'definirTipo'])->name('tipo');
    Route::get('/agente/ligacao', [AgenteController::class, 'pedidoLigacao'])->name('pedido');
    Route::get('/agente/ligacao/listar', [AgenteController::class, 'listarLigacao'])->name('ligacoes');
    Route::post('/agente/ligacao/pedir', [AgenteController::class, 'pedirLigacao'])->name('pedir');
    Route::post('/agente/ligacao/estado', [AgenteController::class, 'mudarLigacao'])->name('estado');
});

Route::get('/teste', function () {
    return view('pages/inicio', [
        'titulo' => 'PDC.Plus'
    ]);
});