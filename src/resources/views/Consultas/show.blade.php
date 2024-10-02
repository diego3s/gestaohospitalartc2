<!-- resources/views/funcionarios/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalhes</h1>

        <table class="table">
            <tr>
                <th>ID:</th>
                <td>{{ $consulta->id }}</td>
            </tr>
            <tr>
                <th>Nome:</th>
                <td>{{ $consulta->medico->crm }}</td>
            </tr>
            <tr>
                <th>Telefone:</th>
                <td>{{ $consulta->paciente->nome }}</td>
            </tr>            
            
        </table>

        <a href="{{ route('consultas.index') }}" class="btn btn-primary">Voltar</a>
        <form action="{{ route('consultas.destroy', $consulta->id) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
        </form>
    </div>
@endsection
