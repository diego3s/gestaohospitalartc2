<!-- resources/views/funcionarios/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalhes do Paciente</h1>

        <table class="table">
            <tr>
                <th>ID:</th>
                <td>{{ $paciente->id }}</td>
            </tr>
            <tr>
                <th>Nome Completo:</th>
                <td>{{ $paciente->nome }}</td>
            </tr>
            <tr>
                <th>CPF:</th>
                <td>{{ $paciente->cpf }}</td>
            </tr>
            <tr>
                <th>Telefone:</th>
                <td>{{ $paciente->genero }}</td>
            </tr>
            
        </table>

        <a href="{{ route('pacientes.index') }}" class="btn btn-primary">Voltar</a>
        <a href="{{ route('pacientes.edit', $paciente->id) }}" class="btn btn-warning">Editar</a>
        <form action="{{ route('pacientes.destroy', $paciente->id) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
        </form>
    </div>
@endsection
