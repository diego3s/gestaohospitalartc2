<!-- resources/views/funcionarios/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Paciente</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pacientes.update', $paciente->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nome_completo">Nome</label>
                <input type="text" class="form-control" name="paciente[nome]" value="{{ old('nome', $paciente->nome) }}" required>
            </div>

            <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="text" class="form-control" name="paciente[cpf]" value="{{ old('cpf', $paciente->cpf) }}" required>
            </div>

            <div class="form-group">
                <label for="telefone">Genero</label>
                <input type="text" class="form-control" name="paciente[genero]" value="{{ old('genero', $paciente->genero) }}">
            </div>

            <button type="submit" class="btn btn-success">Salvar Alterações</button>
        </form>
    </div>
@endsection
