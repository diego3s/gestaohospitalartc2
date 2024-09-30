@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Dívidas</h1>
        <a href="{{ route('dividas.create') }}" class="btn btn-primary">Cadastrar Dívida</a>

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
                    <th>Cobrador</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dividas as $divida)
                    <tr>
                        <td>{{ $divida->id }}</td>
                        <td>{{ $divida->valor }}</td>
                        <td>{{ $divida->cobrador }}</td>
                        <td>
                            <a href="{{ route('dividas.show', $divida->id) }}" class="btn btn-info">Visualizar</a>
                            <a href="{{ route('dividas.edit', $divida->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('dividas.destroy', $divida->id) }}" method="POST" style="display:inline-block;">
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
