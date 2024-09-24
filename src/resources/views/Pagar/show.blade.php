@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalhes do Pagamento</h1>

        <table class="table">
            <tr>
                <th>ID:</th>
                <td>{{ $pagar->id }}</td>
            </tr>
            <tr>
                <th>Valor:</th>
                <td>{{ $pagar->valor }}</td>
            </tr>
            <tr>
                <th>Cobrador:</th>
                <td>{{ $pagar->devedor }}</td>
            </tr>
            
            
        </table>

        <a href="{{ route('pagar.index') }}" class="btn btn-primary">Voltar</a>
        <a href="{{ route('pagar.edit', $pagar->id) }}" class="btn btn-warning">Editar</a>
        <form action="{{ route('pagar.destroy', $pagar->id) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
        </form>
    </div>
@endsection
