@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Consultas</h1>
        <a href="{{ route('consultas.create') }}" class="btn btn-primary">Registrar Consulta</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Paciente</th>
                    <th>Médico</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($consultas as $consulta)
                    <tr>
                        <td>{{ $consulta->id }}</td>
                        <td>{{ $consulta->paciente->nome ?? ''}}</td>
                        <td>{{ $consulta->medico->crm ?? '' }}</td>
                        <td>
                            <a href="{{ route('consultas.show', $consulta->id) }}" class="btn btn-info">Visualizar</a>
                            <form action="{{ route('consultas.destroy', $consulta->id) }}" method="POST" style="display:inline-block;">
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
