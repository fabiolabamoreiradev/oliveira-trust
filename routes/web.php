<?php

use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers;
use App\Http\Controllers\TaxaController;
use App\Http\Controllers\CotacaoController;
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

Route::get('taxa-listar', [TaxaController::class, 'listarTaxas'])->middleware(['auth'])->name('taxa-listar');
Route::get('taxa-editar', [TaxaController::class, 'editarTaxasForm'])->middleware(['auth']);
Route::post('taxa-editar/{token}', [TaxaController::class, 'editarTaxas'])->middleware(['auth']);


Route::get('cotacao-listar', [CotacaoController::class, 'listarCotacoes'])->middleware(['auth'])->name('cotacao-listar');
Route::get('cotacao-cadastrar', [CotacaoController::class, 'cadastrarCotacoesForm'])->middleware(['auth'])->name('cotacao-cadastrar');
Route::post('cotacao-cadastrar/{token}', [CotacaoController::class, 'cadastrarCotacao'])->middleware(['auth']);


Route::get('testa-email',function (){
    $user = new stdClass();
    $user->name  = 'Fabio Laba';
    $user->email = 'fabiolabamoreira@gmail.com';
    $user->tipoEmail = 'esqueci-senha';

    //return new \App\Mail\newLaravelTips($user);
    \Illuminate\Support\Facades\Mail::Send(new \App\Mail\newLaravelTips($user));
});

Route::get('/dashboard', function () {
    include_once('../app/servicos/API.php');
    $hashCotacoes = pegaCotacoes();
    
    return view('dashboard')->with('hashCotacoes', $hashCotacoes);
})->middleware(['auth'])->name('dashboard');




require __DIR__.'/auth.php';
