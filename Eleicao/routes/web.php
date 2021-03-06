<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EleicaoController;
use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\VotosController;

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
    return view('welcome');
});


Route::resource('eleicao', EleicaoController::class)->middleware('auth');
Route::resource('candidato',CandidatoController::class)->middleware('auth');
Route::resource('voto',VotosController::class)->middleware('auth');

/* rota para pesquisar candidato */
Route::get('/{id}', [EleicaoController::class, 'searchcandidate'])->middleware('auth');

/* rota para vincular candidato a eleição */

Route::post('/vincular/{id1}/{id2}', [EleicaoController::class,'vincularCandidato'])->middleware('auth');

Route::post('/votando/{id1}/{id2}', [EleicaoController::class,'votando'])->middleware('auth');

/* rota para mandar as eleições */

// Route::resource('/', [EleicaoController::class,'eleicao_welcome'])->middleware('auth');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');
});
