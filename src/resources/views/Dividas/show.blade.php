<!-- resources/views/funcionarios/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalhes da Dívida</h1>

        <table class="table">
            <tr>
                <th>ID:</th>
                <td>{{ $divida->id }}</td>
            </tr>
            <tr>
                <th>Nome:</th>
                <td>{{ $divida->valor }}</td>
            </tr>
            <tr>
                <th>Telefone:</th>
                <td>{{ $divida->cobrador }}</td>
            </tr>            
            
        </table>

        <a href="{{ route('dividas.index') }}" class="btn btn-primary">Voltar</a>
        <a href="{{ route('dividas.edit', $divida->id) }}" class="btn btn-warning">Editar</a>
        <form action="{{ route('dividas.destroy', $divida->id) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
        </form>
    </div>
@endsection
