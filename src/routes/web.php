<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FuncionariosController;
use App\Http\Controllers\PacientesController;
use App\Http\Controllers\APagarController;
use App\Http\Controllers\AReceberController;
use App\Http\Middleware\CheckRole;
use App\Http\Controllers\DividasController;
use App\Http\Controllers\CobrancasController;
use App\Http\Controllers\ConsultasController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [LoginController::class, 'showLoginForm']);
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::resource('/funcionarios', FuncionariosController::class);
Route::resource('/pacientes', PacientesController::class);

Route::get('/financeiro', function (){
    return view('financeiro');
})->name('financeiro')->middleware('checkrole:Diretor');

Route::resource('/financeiro/dividas', DividasController::class);
Route::resource('/financeiro/cobrancas', CobrancasController::class);
Route::resource('/consultas', ConsultasController::class);

Route::post('/welcome', function () {
    return view('welcome');
});
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome')->middleware('checkrole:Diretor,Administrativo,Enfermeiro,Medico');

