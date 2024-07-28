<?php

use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\PessoaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('pessoas')->group(function () {
    Route::get('/',        [PessoaController::class, 'index']);
    Route::post('/',       [PessoaController::class, 'store']);
    Route::get('/{id}',    [PessoaController::class, 'show']);
    Route::put('/{id}',    [PessoaController::class, 'update']);
    Route::delete('/{id}', [PessoaController::class, 'destroy']);
});

Route::prefix('enderecos')->group(function () {
    Route::post('/',    [EnderecoController::class, 'store']);
    Route::get('/{id}', [EnderecoController::class, 'show']);
    Route::put('/{id}', [EnderecoController::class, 'update']);
});

Route::get('/enderecos/{id}/historico', [EnderecoController::class, 'listHistoricoById']);


