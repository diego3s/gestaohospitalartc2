<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FuncionariosController;
use App\Http\Controllers\PacientesController;
use App\Http\Controllers\APagarController;
use App\Http\Controllers\AReceberController;
use App\Http\Middleware\CheckRole;

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
})->name('financeiro')->middleware('checkrole:diretor');

Route::resource('/pagar', APagarController::class);
Route::resource('/receber', AReceberController::class);

Route::post('/welcome', function () {
    return view('welcome');
});
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');


/*
TO DO   

CRUD paciente


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



Front
src/resources/view/
Sempre criar uma pasta com o nome do módulo
Copiar index, create, edit e show de Funcionarios
Especificar campos obrigatórios

<form action={{ route(<nome_do_módulo>.<acao>) }}>
<input name="<nome_do_objeto>[<campo>]">
Só é realmente necessário o formulário com essas especificações, pode estilizar a vontade

Migration/Model
https://chatgpt.com/g/g-XTOuIQ6Tz-laravel-gpt
Gerar model e Migration, anotar campos obrigatórios
Cuidado com as relações nas migrations, no model o Laravel cuida de tudo
> Quando colocar uma chave estrngeira, a migration da tabela estrangeira já deve estar feita
> Considerar criar a tabela e adicionar as chaves estrangeiras só depois 
    

Como q funciona prontuário ?
*/