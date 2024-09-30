<!-- resources/views/funcionarios/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalhes da Cobrança</h1>

        <table class="table">
            <tr>
                <th>ID:</th>
                <td>{{ $cobranca->id }}</td>
            </tr>
            <tr>
                <th>Valor:</th>
                <td>{{ $cobranca->valor }}</td>
            </tr>
            <tr>
                <th>Devedor:</th>
                <td>{{ $cobranca->devedor }}</td>
            </tr>            
            
        </table>

        <a href="{{ route('cobrancas.index') }}" class="btn btn-primary">Voltar</a>
        <a href="{{ route('cobrancas.edit', $cobranca->id) }}" class="btn btn-warning">Editar</a>
        <form action="{{ route('cobrancas.destroy', $cobranca->id) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
        </form>
    </div>
@endsection
