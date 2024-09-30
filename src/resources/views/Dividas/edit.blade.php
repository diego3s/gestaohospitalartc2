<!-- resources/views/funcionarios/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Dívida</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('dividas.update', $divida->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="valor">Valor</label>
                <input type="text" class="form-control" name="divida[valor]" value="{{ old('valor', $divida->valor) }}" required>
            </div>

            <div class="form-group">
                <label for="cpf">Cobrador</label>
                <input type="text" class="form-control" name="divida[cobrador]" value="{{ old('cobrador', $divida->cobrador) }}" required>
            </div>

            <button type="submit" class="btn btn-success">Salvar Alterações</button>
        </form>
    </div>
@endsection
