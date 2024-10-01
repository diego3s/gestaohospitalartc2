<!-- resources/views/funcionarios/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Funcionários</h1>
        <a href="{{ route('funcionarios.create') }}" class="btn btn-primary">Adicionar Funcionário</a>

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
                    <th>Telefone</th>
                    <th>Salário</th>
                    <th>Cargo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($funcionarios as $funcionario)
                    <tr>
                        <td>{{ $funcionario->id }}</td>
                        <td>{{ $funcionario->nome }}</td>
                        <td>{{ $funcionario->telefone }}</td>
                        <td>{{ $funcionario->salario }}</td>
                        <td>{{ $funcionario->user->cargo ?? '-' }}</td>
                        <td>
                            <a href="{{ route('funcionarios.show', $funcionario->id) }}" class="btn btn-info">Visualizar</a>
                            <a href="{{ route('funcionarios.edit', $funcionario->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('funcionarios.destroy', $funcionario->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                            </form>
                            <a href={{ url('/documentos/'.$funcionario->id) }} class="btn btn-info">Documentos</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
