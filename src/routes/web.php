<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FuncionariosController;
use App\Http\Middleware\CheckRole;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'showLoginForm']);
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () { 
    return view('dashboard');
})->name('dashboard');

Route::resource('/funcionarios', FuncionariosController::class);

Route::get('/test', function () {
    return view('welcome');
})->name('diretortest')->middleware('checkrole:diretor');

/*
TO DO   
Migrations
Models

--- Cadastro de Funcionarios c/ seleção de role
> view de cadastro [X]
> controller de cadastro [X]
> $request => Controller [X]
>> Salvar entradas no Banco [X] [..?]


Com cadastro de funcionarios => Pode fazer login e tem acesso a role
Pode fazer login [X]
Tem acesso a role [X]
Autenticação [X] => middleware funciona [X]

--- Campos obrigatórios ..?

--- Estoque
> CRUD estoque

+ item(descicao, quant)
  edit item
  Saída de Item [ ]
    find(produto)
    produto->quantidade < quantidade
        falha
    produto->quantidade -= quantidade

*/