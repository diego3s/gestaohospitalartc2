<!-- resources/views/funcionarios/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Cadastrar Novo Paciente</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pacientes.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nome_completo">Nome</label>
                <input type="text" class="form-control" name="paciente[nome]" value="{{ old('nome') }}" required>
            </div>

            <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="text" class="form-control" name="paciente[cpf]" value="{{ old('cpf') }}" required>
            </div>

            <div class="form-group">
                <label for="cpf">Telefone</label>
                <input type="text" class="form-control" name="paciente[telefone]" value="{{ old('telefone') }}" required>
            </div>
            
            <div class="form-group">
                <label for="telefone">Data de Nascimento</label>
                <input type="text" class="form-control" name="paciente[data_nascimento]" value="{{ old('data_nascimento') }}">
            </div>

            <div class="form-group">
                <label for="telefone">Genero</label>
                <input type="text" class="form-control" name="paciente[genero]" value="{{ old('genero') }}">
            </div>

            <div class="form-group">
                <label for="telefone">Contato de Emergência</label>
                <input type="text" class="form-control" name="paciente[contato_emergencia]" value="{{ old('genero') }}">
            </div>

            <div class="form-group">
                <label for="telefone">Estado Civil</label>
                <input type="text" class="form-control" name="paciente[estado_civil]" value="{{ old('estado_civil') }}">
            </div>

            <button type="submit" class="btn btn-success">Cadastrar Paciente</button>
        </form>
    </div>
@endsection
