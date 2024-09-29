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
                <label for="nome_completo">Nome</label>
                <input type="text" class="form-control" name="funcionario[nome]" value="{{ old('nome') }}" required>
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
                <select class="form-control" id="cargo" name="usuario[cargo]" required>
                    <option value="" disabled selected>Selecione o cargo</option>
                    <option value="Administrativo">Administrativo</option>
                    <option value="Enfermeiro">Enfermeiro</option>
                    <option value="Laboratorista">Laboratorista</option>
                    <option value="Medico">Médico</option>
                    <option value="Recepcionista">Recepcionista</option>                    
                </select>
            </div>

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
