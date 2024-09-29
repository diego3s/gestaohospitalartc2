<!-- resources/views/funcionarios/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Pacientes</h1>
        <a href="{{ route('pacientes.create') }}" class="btn btn-primary">Adicionar Paciente</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Data de Nascimento</th>
                    <th>Contato de Emergência</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pacientes as $paciente)
                    <tr>
                        <td>{{ $paciente->id }}</td>
                        <td>{{ $paciente->nome }}</td>
                        <td>{{ $paciente->data_nascimento }}</td>
                        <td>{{ $paciente->contato_emergencia }}</td>
                        <td>
                            <a href="{{ route('pacientes.show', $paciente->id) }}" class="btn btn-info">Visualizar</a>
                            <a href="{{ route('pacientes.edit', $paciente->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('pacientes.destroy', $paciente->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
