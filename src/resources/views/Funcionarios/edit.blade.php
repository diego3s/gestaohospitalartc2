<!-- resources/views/funcionarios/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Funcionário</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('funcionarios.update', $funcionario->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nome_completo">Nome</label>
                <input type="text" class="form-control" name="funcionario[nome]" value="{{ old('nome', $funcionario->nome) }}" required>
            </div>

            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control" name="funcionario[telefone]" value="{{ old('telefone', $funcionario->telefone) }}">
            </div>

            <div class="form-group">
                <label for="salario">Salário</label>
                <input type="number" step="0.01" class="form-control" name="funcionario[salario]" value="{{ old('salario', $funcionario->salario) }}" >
            </div>

            <div class="form-group">
                <label for="cargo">Cargo</label>
                <select class="form-control" id="cargo" name="usuario[cargo]" value="{{ old('cargo', $funcionario->user->cargo) }}" required>
                    <option value="Administrativo" {{ $funcionario->user->cargo == 'Administrativo' ? 'selected' : '' }}>Administrativo</option>
                    <option value="Enfermeiro" {{ $funcionario->user->cargo == 'Enfermeiro' ? 'selected' : '' }}>Enfermeiro</option>
                    <option value="Laboratorista" {{ $funcionario->user->cargo == 'Laboratorista' ? 'selected' : '' }}>Laboratorista</option>
                    <option value="Medico" {{ $funcionario->user->cargo == 'Medico' ? 'selected' : '' }}>Médico</option>
                    <option value="Recepcionista" {{ $funcionario->user->cargo == 'Recepcionista' ? 'selected' : '' }}>Recepcionista</option>  
                </select>
            </div>

            <!-- Informações de Usuário -->
            <h3>Dados de Login do Funcionário</h3>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="usuario[email]" value="{{ old('email', $funcionario->user->email) }}" required>
            </div>

            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" name="usuario[password]" required>
            </div>
            <button type="submit" class="btn btn-success">Salvar Alterações</button>
        </form>
    </div>
@endsection
