<!-- resources/views/funcionarios/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalhes do Funcionário</h1>

        <table class="table">
            <tr>
                <th>ID:</th>
                <td>{{ $funcionario->id }}</td>
            </tr>
            <tr>
                <th>Nome Completo:</th>
                <td>{{ $funcionario->nome}}</td>
            </tr>
            <tr>
                <th>Telefone:</th>
                <td>{{ $funcionario->telefone }}</td>
            </tr>
            <tr>
                <th>Salário:</th>
                <td>R$ {{ number_format($funcionario->salario, 2, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Email:</th>
                <td>{{ $funcionario->user->email ?? 'nao informado' }}</td>
            </tr>
            <tr>
                <th>Cargo:</th>
                <td>{{ $funcionario->user->cargo ?? 'nao informado' }}</td>
            </tr>


        </table>

        <a href="{{ route('funcionarios.index') }}" class="btn btn-primary">Voltar</a>
        <a href="{{ route('funcionarios.edit', $funcionario->id) }}" class="btn btn-warning">Editar</a>
        <form action="{{ route('funcionarios.destroy', $funcionario->id) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
        </form>
    </div>
@endsection
