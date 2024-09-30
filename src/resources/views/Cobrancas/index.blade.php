<!-- resources/views/funcionarios/index.blade.php -->
@extends('layouts.app')

@section('title', 'Cobranças')

@section('content')
    <div class="container">
        <h1>Lista de Cobrancas</h1>
        <a href="{{ route('cobrancas.create') }}" class="btn btn-primary">Cadastrar Cobrança</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Valor</th>
                    <th>Devedor</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cobrancas as $cobranca)
                    <tr>
                        <td>{{ $cobranca->id }}</td>
                        <td>{{ $cobranca->valor }}</td>
                        <td>{{ $cobranca->devedor }}</td>
                        <td>
                            <a href="{{ route('cobrancas.show', $cobranca->id) }}" class="btn btn-info">Visualizar</a>
                            <a href="{{ route('cobrancas.edit', $cobranca->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('cobrancas.destroy', $cobranca->id) }}" method="POST" style="display:inline-block;">
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
