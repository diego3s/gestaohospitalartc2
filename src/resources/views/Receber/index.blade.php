@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Histórico</h1>
        <a href="{{ route('pagar.create') }}" class="btn btn-primary">Adicionar Pagamento</a>

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
                @foreach ($receber as $pagamento)
                    <tr>
                        <td>{{ $pagamento->id }}</td>
                        <td>{{ $pagamento->valor }}</td>
                        <td>{{ $pagamento->cobrador }}</td>
                        <td>
                            <a href="{{ route('receber.show', $pagamento->id) }}" class="btn btn-info">Visualizar</a>
                            <a href="{{ route('receber.edit', $pagamento->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('receber.destroy', $pagamento->id) }}" method="POST" style="display:inline-block;">
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