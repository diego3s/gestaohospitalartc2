<!-- resources/views/funcionarios/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalhes do Pagamento</h1>

        <table class="table">
            <tr>
                <th>ID:</th>
                <td>{{ $receber->id }}</td>
            </tr>
            <tr>
                <th>Valor:</th>
                <td>{{ $receber->valor }}</td>
            </tr>
            <tr>
                <th>Devedor:</th>
                <td>{{ $receber->devedor }}</td>
            </tr>
            
            
        </table>

        <a href="{{ route('receber.index') }}" class="btn btn-primary">Voltar</a>
        <a href="{{ route('receber.edit', $funcionario->id) }}" class="btn btn-warning">Editar</a>
        <form action="{{ route('receber.destroy', $funcionario->id) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
        </form>
    </div>
@endsection
