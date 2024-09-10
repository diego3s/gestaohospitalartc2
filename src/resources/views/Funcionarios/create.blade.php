<!-- resources/views/funcionarios/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Cadastrar Novo Funcionário</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('funcionarios.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nome_completo">Nome Completo</label>
                <input type="text" class="form-control" name="funcionario[nome_completo]" value="{{ old('nome_completo') }}" required>
            </div>

            <div class="form-group">
                <label for="nome_completo">Nome de Usuário</label>
                <input type="text" class="form-control" name="usuario[name]" value="{{ old('nome') }}" required>
            </div>

            <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="text" class="form-control" name="funcionario[cpf]" value="{{ old('cpf') }}" required>
            </div>

            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control" name="funcionario[telefone]" value="{{ old('telefone') }}">
            </div>

            <div class="form-group">
                <label for="salario">Salário</label>
                <input type="number" step="0.01" class="form-control" name="funcionario[salario]" value="{{ old('salario') }}" >
            </div>

            <div class="form-group">
                <label for="cargo">Cargo</label>
                <select class="form-control" id="cargo" name="usuario[cargo]" value="{{ old('cargo') }}" required>
                    <option value="" disabled selected>Selecione o cargo</option>
                    <option value="recepcionista">Recepcionista</option>
                    <option value="enfermeiro">Enfermeiro</option>
                    <option value="tecnico">Técnico de Laboratório</option>
                    <option value="medico">Médico</option>
                    <option value="administrativo">Administrativo</option>
                    <option value="diretor">Diretor Clínico</option>
                </select>
            </div>

            <!-- Informações de Usuário -->
            <h3>Dados de Login do Funcionário</h3>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="usuario[email]" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" name="usuario[password]" required>
            </div>

            <button type="submit" class="btn btn-success">Cadastrar Funcionário</button>
        </form>
    </div>
@endsection
